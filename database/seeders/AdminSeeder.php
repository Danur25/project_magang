<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@pln.com'],
            [
                'name' => 'Admin PLN',
                'email' => 'admin@pln.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin'
            ]
        );
    }
}
