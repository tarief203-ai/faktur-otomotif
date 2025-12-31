<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Akun Login untuk Dosen:
     * Admin: admin@test.com | pw: admin123
     * Staff: staff@test.com | pw: staff123
     */
    public function run(): void
    {
        // 1. Akun Admin
        User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        // 2. Akun Staff
        User::updateOrCreate(
            ['email' => 'staff@test.com'],
            [
                'name' => 'Staff Operasional',
                'password' => Hash::make('staff123'),
                'role' => 'staff',
            ]
        );
    }
}