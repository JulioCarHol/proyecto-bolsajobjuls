<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Administrador Principal',
            'adminname' => 'admin',
            'email' => 'admin@bolsajobjuls.com',
            'password' => 'password123',
        ]);

        Admin::create([
            'name' => 'Super Admin',
            'adminname' => 'superadmin',
            'email' => 'superadmin@bolsajobjuls.com',
            'password' => 'superadmin123',
        ]);
    }
}
