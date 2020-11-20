<?php

namespace Database\Seeders;

use App\Models\Campus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campuses = [
            [
                'code' => 'ZZZ',
                'name' => 'UNKNOWN',
                'address' => '',
                'suburb' => '',
                'created_at'=> Carbon::yesterday(),
            ],
            [
                'code' => 'PER',
                'name' => 'Perth (Northbridge)',
                'address' => 'Aberdeen Street',
                'suburb' => 'PERTH',
                'created_at'=> Carbon::now(),
            ],
            [
                'code' => 'MID',
                'name' => 'Midland',
                'address' => 'Cnr Lord St & Eddie Barron Drive',
                'suburb' => 'Midland',
                'created_at'=> Carbon::now(),
            ],
            [
                'code' => 'BAL',
                'name' => 'Balga',
                'address' => '',
                'suburb' => '',
                'created_at'=> Carbon::today(),
            ],
            [
                'code' => 'LEE',
                'name' => 'Leederville',
                'address' => '',
                'suburb' => 'Leaderville',
                'created_at'=> Carbon::now(),
            ],
            [
                'code' => 'JOO',
                'name' => 'Joondalup',
                'address' => '',
                'suburb' => 'Joondalup',
                'created_at'=> Carbon::yesterday(),
            ],
            [
                'code' => 'EPR',
                'name' => 'East Perth',
                'address' => '',
                'suburb' => 'East Perth',
                'created_at'=> Carbon::now(),
            ],
        ];

        foreach ($campuses as $campus) {
            Campus::insert([
                'code' => $campus['code'],
                'name' => $campus['name'],
                'address' => $campus['address'],
                'suburb' => $campus['suburb'],
                'created_at' => $campus['created_at'],
            ]);
        }
    }
}
