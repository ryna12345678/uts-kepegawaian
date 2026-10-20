<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat akun admin
        User::updateOrCreate(
            ['email' => 'admin@kepegawaian.test'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
            ]
        );

        // Membuat departemen
        $administrasi = Department::firstOrCreate([
            'name' => 'Administrasi',
        ]);

        $keuangan = Department::firstOrCreate([
            'name' => 'Keuangan',
        ]);

        $ti = Department::firstOrCreate([
            'name' => 'Teknologi Informasi',
        ]);

        // Membuat lima data karyawan
        $employees = [
            [
                'name' => 'Andi Saputra',
                'department_id' => $administrasi->id,
                'position' => 'Staf Administrasi',
                'salary' => 3500000,
                'joined_at' => '2024-01-10',
            ],
            [
                'name' => 'Budi Santoso',
                'department_id' => $administrasi->id,
                'position' => 'Resepsionis',
                'salary' => 3200000,
                'joined_at' => '2024-02-15',
            ],
            [
                'name' => 'Citra Lestari',
                'department_id' => $keuangan->id,
                'position' => 'Staf Keuangan',
                'salary' => 4000000,
                'joined_at' => '2023-08-01',
            ],
            [
                'name' => 'Dewi Anggraini',
                'department_id' => $keuangan->id,
                'position' => 'Akuntan',
                'salary' => 4500000,
                'joined_at' => '2023-09-12',
            ],
            [
                'name' => 'Eko Pratama',
                'department_id' => $ti->id,
                'position' => 'IT Support',
                'salary' => 4200000,
                'joined_at' => '2024-03-20',
            ],
        ];

        foreach ($employees as $employee) {
            Employee::firstOrCreate(
                ['name' => $employee['name']],
                $employee
            );
        }
    }
}
