<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\support\Facades\File;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // for ($i=0; $i <=5 ; $i++) { 
        //     user::create([
        //             'name'=>fake()->name(),
        //             'email'=>fake()->email(),
        //             'age'=>fake()->numberBetween(15,20),
        //             'city'=>fake()->city()
        //         ]);
        // }

        $json = File::get(path:'database\json\users.json');
        $users =collect(json_decode($json));
        $users->each(function($user){
            user::create([
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'age'=>$user->age,
                    'city'=>$user->city
                ]);
        });
    }
}
