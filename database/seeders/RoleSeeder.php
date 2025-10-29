<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Define roles
        $roles = [
        'Patient',
        'Doctor',
        'Receptionist',
        'Administrator'
        ];
        //Create roles
        foreach ($roles as $role){
            Role::create([
                'name' => $role,
            ]);
        }
    }
}
