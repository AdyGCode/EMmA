<?php

namespace App\Http\Livewire;

use App\Models\EquipmentType;
use App\Models\FAIcon;
use Livewire\Component;

class EquipmentTypes extends Component
{

    public $equipmentTypes;
    public $name, $description, $code, $icon, $equipmentType_id;
    public $icons;
    public $isOpen;
    public $updateMode = false;

    public function render()
    {
        $this->equipmentTypes = EquipmentType::all();
        $this->icons = FAIcon::all();

        return view('livewire.equipmentTypes.equipment-types');
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
        $rules = ['name' => 'required|min:3',];
        if (!$this->updateMode) {
            $rules['code'] = 'required|unique:equipment_types';
        }
        $this->validate($rules);

        EquipmentType::updateOrCreate(
            ['id' => $this->equipmentType_id],
            [
                'name' => $this->name,
                'description' => $this->description,
                'code' => $this->code,
                'icon' => $this->icon,
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
        $this->code = $EquipmentType->code;
        $this->icon = $EquipmentType->icon;
        $this->openModal();
    }


    public function delete($id)
    {
        EquipmentType::find($id)->delete();
        session()->flash('message', 'EquipmentType Deleted Successfully.');
    }


}
