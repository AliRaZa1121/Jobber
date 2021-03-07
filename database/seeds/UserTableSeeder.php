<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('users')->insert([
            [
                'role_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@ede.com',
                'password' => Hash::make('click123'),
                'phone' => '123456789',
                'address' => 'ABC Road, XYZ Street',
                'city' => 'Housten',
                'state' => 'TX',
                'country' => 'United States',
                'image' => '',
                'status' => 1,
                'identity_token' => Str::random(12, 'alphaNum'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'role_id' => 2,
                'name' => 'Coach',
                'email' => 'coach@da.com',
                'password' => Hash::make('click123'),
                'phone' => '123456789',
                'address' => 'ABC Road, XYZ Street',
                'city' => 'Housten',
                'state' => 'TX',
                'country' => 'United States',
                'image' => '',
                'status' => 1,
                'identity_token' => Str::random(12, 'alphaNum'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'role_id' => 3,
                'name' => 'Player',
                'email' => 'player@da.com',
                'password' => Hash::make('click123'),
                'phone' => '123456789',
                'address' => 'ABC Road, XYZ Street',
                'city' => 'Housten',
                'state' => 'TX',
                'country' => 'United States',
                'image' => '',
                'status' => 1,
                'identity_token' => Str::random(12, 'alphaNum'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            ]);
        }
    }
    