<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Campus;

class Campuses extends Component
{
    public $campuses;
    public $name, $suburb, $code, $address, $campus_id;
    public $isOpen;

    public function render()
    {
        $this->campuses = Campus::all();
        return view('livewire.campuses.campuses');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    private function resetInputFields()
    {
        $this->name = "";
        $this->suburb = "";
        $this->code = "";
        $this->address = "";
        $this->campus_id="";
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:3',
            'code' => 'required|unique:campuses',
        ]);

        Campus::updateOrCreate(
            ['id' => $this->campus_id],
            [
                'name' => $this->name,
                'suburb' => $this->suburb,
                'code' => $this->code,
                'address' => $this->address,
            ]);

        session()->flash('message',
            $this->campus_id ? 'Campus Updated Successfully.' : 'Campus Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $Campus = Campus::findOrFail($id);
        $this->campus_id = $id;
        $this->name = $Campus->name;
        $this->suburb = $Campus->suburb;
        $this->code = $Campus->code;
        $this->address = $Campus->address;
        $this->openModal();
    }


    public function delete($id)
    {
        Campus::find($id)->delete();
        session()->flash('message', 'Campus Deleted Successfully.');
    }

}
