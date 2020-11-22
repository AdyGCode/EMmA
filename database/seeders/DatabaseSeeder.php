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
            FACategorySeeder::class,
            FaIconSeeder::class,
            CampusSeeder::class,
            EquipmentTypeSeeder::class,
            EquipmentSeeder::class,
            AssetSeeder::class,
            UserSeeder::class,
            TeamsSeeder::class,
        ]);
    }
}
