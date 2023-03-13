<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =  [
            'username' => 'Admin',
            'name' => 'Anil',
            'email' => 'anilv4481@gmail.com',
            'phone' => '7984954227',
            'about' => 'Demo',
            'c_password' => Hash::make('Anilv4481'),
            'password' => Hash::make('Anilv4481'),
            'role'=>'3',

        ];
        User::create($data);
    }
}
