<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            [
                'name' => "Administrator",
                'personal_team' => true,
            ], [
                'name' => "Student",
                'personal_team' => true,
            ], [
                'name' => "Ady G",
                'personal_team' => true,
            ],
        ];

        foreach($teams as $team){
            $user = User::where('name','=',$team['name'])->first();
            Team::insert([
                'user_id' => $user->id,
                'name'=>$team['name']."'s team",
                'personal_team'=>$team['personal_team'],
            ]);
        }
    }
}
