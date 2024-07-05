<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengisi tabel roles
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'admin'],
            ['id' => 2, 'name' => 'teacher'],
            ['id' => 3, 'name' => 'student'],
            ['id' => 4, 'name' => 'user'],
            ['id' => 5, 'name' => 'cashier'],
        ]);

        // Mengisi tabel users
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => 1,
            ],
            [
                'name' => 'viska',
                'email' => 'viska@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => 5,
            ],
            [
                'name' => 'ratil',
                'email' => 'ratil@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => 5,
            ],
            [
                'name' => 'isti',
                'email' => 'isti@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => 5,
            ],
            [
                'name' => 'roni',
                'email' => 'roni@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => 5,
            ],
            [
                'name' => 'Guru 1',
                'email' => 'guru1@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2,
            ],
            [
                'name' => 'Guru 2',
                'email' => 'guru2@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2,
            ],
            [
                'name' => 'Siswa 1',
                'email' => 'siswa1@example.com',
                'password' => Hash::make('password'),
                'role_id' => 3,
            ],
            [
                'name' => 'Siswa 2',
                'email' => 'siswa2@example.com',
                'password' => Hash::make('password'),
                'role_id' => 3,
            ],
        ]);

        // Mengisi tabel teachers
        DB::table('teachers')->insert([
            [
                'user_id' => 2, // ID user untuk Guru 1
                'name' => 'Guru 1',
                'address' => 'Jl. Pendidikan No. 1',
                'phone' => '081234567890',
                'email' => 'guru1@example.com',
            ],
            [
                'user_id' => 3, // ID user untuk Guru 2
                'name' => 'Guru 2',
                'address' => 'Jl. Pendidikan No. 2',
                'phone' => '081234567891',
                'email' => 'guru2@example.com',
            ],
        ]);
    }
}
