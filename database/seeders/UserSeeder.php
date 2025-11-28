<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@controlobra.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Supervisor Obra',
            'email' => 'supervisor@controlobra.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@controlobra.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Crear 5 usuarios adicionales
        User::factory(5)->create();
    }
}