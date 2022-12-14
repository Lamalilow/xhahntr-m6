<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      User::insert([
        'fullname' => 'admin' ,
        'email' => 'admin@admin.admin',
        'login' => 'admin',
        'address' => 'admin',
        'password' => Hash::make('admin'),
        'role' => 'admin'
        ]);
    }
}
