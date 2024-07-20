<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Medecin;
use App\Models\Secretaire;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medecin::create([
            'username' => 'medecin1',
            'password' => Hash::make('password123'),
        ]);

        Secretaire::create([
            'username' => 'secretaire1',
            'password' => Hash::make('password123'),
        ]);
    }
}

