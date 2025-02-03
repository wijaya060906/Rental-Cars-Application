<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'lvl' => 'admin',
        ]);
        User::create([
            'name' => 'Petugas',
            'email' => 'petugas@example.com',
            'password' => Hash::make('petugas'),
            'lvl' => 'petugas',
        ]);
        Member::create([
            'nama' => 'Member',
            'email' => 'member@example.com',
            'password' => Hash::make('member'),
            'jk'=> 'L',
            'telp'=> '081234567890',
            'alamat'=>'Jl. Jalan No. 1',
            'user'  => 'member',
        ]);
    }
}
