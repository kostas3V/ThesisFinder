<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$admin = new User([

            'name' => 'Konstantinos Katsioulas',
            'email' => 'kostaskats4@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'), // password
            'remember_token' => Str::random(10),
            'role' => 'admin',
        ]); 
        
        $admin->save();  */

        User::create([

            'name' => 'Konstantinos Katsioulas',
            'email' => 'kostaskats4@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'), // password
            'remember_token' => Str::random(10),
            'role' => 'admin',
        ]);

        User::create([

            'name' => 'Test 1',
            'email' => 'test1@test1.com',
            'email_verified_at' => now(),
            'password' => Hash::make('11111111'), // password
            'remember_token' => Str::random(10),
            'role' => 'admin',
        ]);

        User::create([

            'name' => 'Test',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('00000000'), // password
            'remember_token' => Str::random(10),
            'role' => '',
        ]);


        
    }
}
