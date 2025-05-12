<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        $superAdminRole = Role::firstOrCreate(['name' => 'superAdmin']);

        $superAdmin = User::firstOrCreate([
            'email' => 'superadmin@example.com'
        ], [
            'name' => 'Super Admin',
            'phone' => '+998919579717',
            'status' => 1,
            'password' => bcrypt('password'), // Parolni o'zgartiring
        ]);

        $superAdmin->roles()->sync([$superAdminRole->id]);

        echo "SuperAdmin yaratildi: superadmin@example.com / password\n";
    }
}

