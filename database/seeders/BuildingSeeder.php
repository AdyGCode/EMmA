<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //            $table->string('code')->default('ZZZ');
        //            $table->string('name')->default('UNKNOWN');
        //            $table->unsignedBigInteger('campus_id')->default(0);

        $buildings = [
            [
                'id'=>1,
                'code' => 'ZZZ',
                'name' => 'UNKNOWN BUILDING',
                'campus_id' => 0,
            ],
            [
                'id'=>2,
                'code' => '19ASP',
                'name' => 'Building 6, 19 Aberdeen Street',
                'campus_id' => 2,
            ],
            [
                'id'=>3,
                'code' => '30ASP',
                'name' => 'Building 2, 30 Aberdeen Street',
                'campus_id' => 2,
            ],
            [
                'id'=>4,
                'code' => '25ASP',
                'name' => 'Building 1, 25 Aberdeen Street',
                'campus_id' => 2,
            ],
            [
                'id'=>5,
                'code' => '12ASP',
                'name' => 'Building 5, 12 Aberdeen Street',
                'campus_id' => 2,
            ],
            [
                'id'=>6,
                'code' => '14ASP',
                'name' => 'Building 3, 12 Aberdeen Street',
                'campus_id' => 2,
            ],
            [
                'id'=>7,
                'code' => 'ALEBD',
                'name' => 'A Block, Cnr Lord St and Eddie Barron Drive',
                'campus_id' => 3,
            ],
            [
                'id'=>8,
                'code' => 'CLEBD',
                'name' => 'C Block, Cnr Lord St and Eddie Barron Drive',
                'campus_id' => 3,
            ],
        ];
    }
}
