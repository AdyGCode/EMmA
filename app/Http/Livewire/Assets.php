<?php

namespace App\Http\Livewire;

use App\Models\Asset;
use App\Models\FACategory;
use App\Models\FAIcon;
use Livewire\Component;
use Livewire\WithPagination;

class Assets extends Component
{
    use WithPagination;
    public $name, $description, $code, $icon, $asset_id;

    //public $assets;
    public $icons = [];
    public $categories, $category;

    public $isOpen = false, $updateMode = false;

    public function render()
    {
        $this->categories = FACategory::orderBy('name')->get();

        if (!empty($this->category)) {
            $this->icons = FAIcon::where('f_a_category_id', $this->category)->get();
        }

        return view('livewire.assets.assets', [
            'assets' => Asset::paginate(5)
        ]);
    }

    public function mount($category = null, $icon = 0)
    {
        $this->category = $category;
        $this->icon = $icon;
    }


    public function updated()
    {
        if (!empty($this->icon)) {
//            dd($this->icon);
        }
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
        $this->icon = "";
        $this->asset_id = "";
        $this->updateMode = false;
    }

    public function store()
    {
        // Modify rule depending on if it is an edit or an update
        $rules = [
            'code' => 'required|min:1|max:7',
            'name' => 'required|min:3|max:32',
            'icon' => 'required'
        ];
        if (!$this->updateMode) {
            $rules['code'] .= '|unique:equipment_types';
        }
        $this->validate($rules);

        Asset::updateOrCreate(
            ['id' => $this->asset_id],
            [
                'name' => $this->name,
                'description' => $this->description,
                'code' => strtoupper($this->code),
                'f_a_icon_id' => $this->icon,
            ]);

        session()->flash('message',
            $this->asset_id ? 'Asset Updated Successfully.' : 'Asset Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->updateMode = true;

        $Asset = Asset::findOrFail($id);
        $this->asset_id = $id;
        $this->name = $Asset->name;
        $this->description = $Asset->description;
        $this->code = strtoupper($Asset->code);
        $this->icon = $Asset->icon;
        $this->openModal();
    }


    public function delete($id)
    {
        Asset::find($id)->delete();
        session()->flash('message', 'Asset Deleted Successfully.');
    }


}
