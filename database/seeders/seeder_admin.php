<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class seeder_admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data=[

        ['id' => 'IDadmin', 'name' => 'Efendi', 'email' => 'efendi@mail.com', 'email_verified_at' => now() , 'password'=>Hash::make('admin123'), 'role_user'=>'admin'],

        ];
        DB::table('users')->insert($data);
    }
}
