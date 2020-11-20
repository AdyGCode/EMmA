<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            EquipmentTypeSeeder::class,
            FaIconSeeder::class,
            CampusSeeder::class,
            EquipmentSeeder::class,
            AssetSeeder::class,
            TeamsSeeder::class,
        ]);
    }
}
