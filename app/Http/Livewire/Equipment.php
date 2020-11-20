<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use App\Models;

class Equipment extends Component
{

    public $equipmentTypes, $equipment;
    public $code,$name, $description, $equipment_id, $equipment_type_id;
    public $isOpen;
    public $updateMode = false;

    public function render()
    {
        $this->equipmentTypes = \App\Models\EquipmentType::all();
        $this->equipment = \App\Models\Equipment::all();

        return view('livewire.equipment.equipment');
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
        $this->description = "";
        $this->code = "";
        $this->equipment_type_id = "";
        $this->equipment_id = "";
        $this->updateMode = false;
    }

    public function store()
    {
        // Modify rule depending on if it is an edit or an update
        $rules = ['name' => 'required|min:3',];
        if (!$this->updateMode) {
            $rules['code'] = 'required|unique:equipment';
        }
        $this->validate($rules);

        \App\Models\Equipment::updateOrCreate(
            ['id' => $this->equipment_id],
            [
                'name' => $this->name,
                'description' => $this->description,
                'code' => $this->code,
                'equipment_type_id' => $this->equipment_type_id,
        ]);

        session()->flash('message',
            $this->equipment_id ? 'Equipment Item Updated Successfully.' : 'Equipment Item Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->updateMode = true;

        $Equipment = \App\Models\Equipment::findOrFail($id);
        $this->equipment_id = $id;
        $this->name = $Equipment->name;
        $this->description = $Equipment->description;
        $this->code = $Equipment->code;
        $this->equipment_type_id = $Equipment->equipment_type_id;
        $this->openModal();
    }


    public function delete($id)
    {
        \App\Models\Equipment::find($id)->delete();
        session()->flash('message', 'Equipment item deleted successfully.');
    }


}
