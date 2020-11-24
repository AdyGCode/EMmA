<?php

namespace App\Http\Livewire;

use App\Models\EquipmentType;
use App\Models\FACategory;
use App\Models\FAIcon;
use Livewire\Component;

class EquipmentTypes extends Component
{

    public $name, $description, $code, $icon, $equipmentType_id;

    public $equipmentTypes;
    public $icons = [];
    public $categories, $category;

    public $isOpen = false, $updateMode = false;

    public function render()
    {
        $this->categories = FACategory::orderBy('name')->get();

        if (!empty($this->category)) {
            $this->icons = FAIcon::where('f_a_category_id', $this->category)->get();
        }

        $this->equipmentTypes = EquipmentType::all();

        return view('livewire.equipmentTypes.equipment-types');
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
        $this->equipmentType_id = "";
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

        EquipmentType::updateOrCreate(
            ['id' => $this->equipmentType_id],
            [
                'name' => $this->name,
                'description' => $this->description,
                'code' => strtoupper($this->code),
                'f_a_icon_id' => $this->icon,
            ]);

        session()->flash('message',
            $this->equipmentType_id ? 'Equipment Type Updated Successfully.' : 'Equipment Type Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->updateMode = true;

        $EquipmentType = EquipmentType::findOrFail($id);
        $this->equipmentType_id = $id;
        $this->name = $EquipmentType->name;
        $this->description = $EquipmentType->description;
        $this->code = strtoupper($EquipmentType->code);
        $this->icon = $EquipmentType->icon;
        $this->openModal();
    }


    public function delete($id)
    {
        EquipmentType::find($id)->delete();
        session()->flash('message', 'EquipmentType Deleted Successfully.');
    }


}
