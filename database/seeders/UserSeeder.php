<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'lucas@andrade.com'],
            [
                'name' => 'Lucas Andrade',
                'document' => '12345678909',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'position' => 'Dev back-end',
                'birth_date' => '1999-08-14',
            ]
        );
    }
}
