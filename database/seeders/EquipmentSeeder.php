<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //code
        //name
        //description
        //equipment_type_id

        $equipment = [
            [
                'code' => 'UNK',
                'name' => 'UNKNOWN',
                'description' => '',
                'equipment_type_id' => 1,
                'created_at'=> Carbon::yesterday(),
            ],
            [
                'code' => 'PI4B4G',
                'name' => 'Raspberry Pi 4B, 4GB',
                'description' => '',
                'equipment_type_id' => 2,
                'created_at'=> Carbon::yesterday(),
            ],
            [
                'code' => 'MAC0001',
                'name' => 'MacBook Air',
                'description' => 'Apple Macbook Air, 20xx model',
                'equipment_type_id' => 3,
                'created_at'=> Carbon::today(),
            ],
            [
                'code' => 'PI4B8G',
                'name' => 'Raspberry Pi 4B, 8GB',
                'description' => '',
                'equipment_type_id' => 2,
                'created_at'=> Carbon::now(),
            ],
            [
                'code' => 'TV0001',
                'name' => 'Television',
                'description' => '',
                'equipment_type_id' => 4,
                'created_at'=> Carbon::now(),
            ],
            [
                'code' => 'PI3B',
                'name' => 'Raspberry Pi 3B, 1GB',
                'description' => 'Low power single board computer with 1GB RAM...',
                'equipment_type_id' => 2,
                'created_at'=> Carbon::now(),
            ],
        ];

        foreach ($equipment as $item) {
            Equipment::insert([
                'code' => $item['code'],
                'name' => $item['name'],
                'description' => $item['description'],
                'equipment_type_id' => $item['equipment_type_id'],
                'created_at' => $item['created_at'],
            ]);
        }
    }
}
