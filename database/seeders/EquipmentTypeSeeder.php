<?php

namespace Database\Seeders;

use App\Models\EquipmentType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class EquipmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'id' => 1,
                'code' => 'UNK',
                'name' => 'UNKNOWN',
                'description' => '',
                'icon' => 'question',
                'created_at' => Carbon::yesterday(),
            ],
            [
                'id' => 2,
                'code' => 'SBC',
                'name' => 'Single Board Computer',
                'description' => '',
                'icon' => 'microchip',
                'created_at' => Carbon::yesterday(),
            ],
            [
                'id' => 3,
                'code' => 'LAP',
                'name' => 'Laptop',
                'description' => '',
                'icon' => 'laptop',
                'created_at' => Carbon::yesterday(),
            ],
            [
                'id' => 4,
                'code' => 'TV',
                'name' => 'Television',
                'description' => '',
                'icon' => 'tv',
                'created_at' => Carbon::today(),
            ],
            [
                'id' => 5,
                'code' => 'RBT',
                'name' => 'Robot',
                'description' => '',
                'icon' => 'robot',
                'created_at' => Carbon::today(),
            ],
            [
                'id' => 6,
                'code' => 'SLR',
                'name' => 'SLR Camera',
                'description' => '',
                'icon' => 'camera-retro',
                'created_at' => Carbon::today(),
            ],
            [
                'id' => 7,
                'code' => 'DRON',
                'name' => 'Drone',
                'description' => '',
                'icon' => 'helicopter',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'code' => 'DSLR',
                'name' => 'Digital SLR Camera',
                'description' => '',
                'icon' => 'camera',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'code' => 'VCMR',
                'name' => 'Video Camera',
                'description' => '',
                'icon' => 'video',
                'created_at' => Carbon::now(),
            ],
            [
                'code' => 'SWTCH',
                'name' => 'Network Switch',
                'description' => 'Network Switch',
                'icon' => 'switch',
                'created_at' => Carbon::now(),
            ],
            [
                'code' => 'HAT',
                'name' => 'Hat or pHat',
                'description' => 'Development board containing sensors, actuators and other '.
                    'extended capabilities for SBCs and Microcontrollers',
                'icon' => 'hat',
                'created_at' => Carbon::now(),
            ],
            [
                'code' => 'SENSR',
                'name' => 'Sensor',
                'description' => 'Electronic sensor component or small PCB with sensor electronics',
                'icon' => 'video',
                'created_at' => Carbon::now(),
            ],
            [
                'code' => 'ACTR',
                'name' => 'Actuator',
                'description' => 'Electronic actuator component or small PCB with actuator electronics',
                'icon' => 'video',
                'created_at' => Carbon::now(),
            ],
        ];

        foreach ($types as $type) {
            EquipmentType::insert([
                'code' => $type['code'],
                'name' => $type['name'],
                'description' => $type['description'],
                'icon' => $type['icon'],
                'created_at' => $type['created_at'],
            ]);
        }
    }
}
