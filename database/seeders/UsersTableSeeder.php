<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => config('admin.name'),
            'email' => config('admin.email'),
            'phone' => config('admin.phone'),
            'address' => config('admin.address'),
            'password' => Hash::make(config('admin.password')),
            'role_id' => config('const.admin'),
        ]);
        
        User::create([
            'name' => "Hoàng Trung Thông",
            'email' => "hoangtrungthong0000@gmail.com",
            'phone' => "0345236493",
            'address' => "Chùa Thầy, Sài Sơn, Quốc Oai",
            'password' => Hash::make("123123"),
            'role_id' => config('const.user'),
        ]);
    }
}