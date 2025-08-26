<?php

namespace Database\Seeders;

use App\Enums\Role;
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
            ['email' => 'sistema@admin.com'],
            [
                'name' => 'Administrador do Sistema',
                'document' => fake()->unique()->cpf(false),
                'password' => Hash::make('password'),
                'role' => Role::ADMIN,
                'position' => 'ADM Sistema',
                'birth_date' => fake()->dateTimeBetween('-40 years', '-18 years')->format('d/m/Y')
            ]
        )->each(function ($user) {
            User::firstOrCreate(
                ['email' => 'sistema@employee.com'],
                [
                    'name' => 'Funcionário do Sistema',
                    'document' => fake()->unique()->cpf(false),
                    'password' => Hash::make('password'),
                    'role' => Role::EMPLOYEE,
                    'position' => 'Funcionário Sistema',
                    'birth_date' => fake()->dateTimeBetween('-40 years', '-18 years')->format('d/m/Y'),
                    'created_by' => $user->id
                ]
            );
        });


        User::factory()->count(2)->create([
            'role' => Role::ADMIN
        ])->each(function ($user) {
            User::factory()->count(3)->create([
                'role' =>  Role::EMPLOYEE,
                'created_by' => $user->id,
            ]);
        });
    }
}
