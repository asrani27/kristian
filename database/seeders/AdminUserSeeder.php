<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Kristian',
            'username' => 'kristian',
            'email' => 'admin@kristian.id',
            'password' => Hash::make('kristian'),
            'role' => 'admin',
        ]);
    }
}
