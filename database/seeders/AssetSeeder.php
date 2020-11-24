<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // equipment_id
        // asset_number
        // campus_id
        // building_id
        // room

        $assets = [
            [
                'equipment_id'=>null,
                'asset_number'=>null,
                'campus_id'=>null,
                'building_id'=>null,
                'room'=>null,
            ],
            [
                'equipment_id'=>2,
                'asset_number'=>null,
                'campus_id'=>2,
                'building_id'=>null,
                'room'=>null,
            ],

        ];

    }
}
