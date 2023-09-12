<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // User::factory(10)->create();
        for($i=0 ;$i<10;$i++){
            User::factory()->create([
                //'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('xyz'),

            ]);
        }        
    }
}
