<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        // Admin (role = 2)
        $admin = User::firstOrCreate(
            ['phone' => '+998901234567'], // Email o‘rniga phone
            [
                'full_name' => 'Admin User',
                'password' => bcrypt('admin123'),
                'role' => User::ROLE_ADMIN,
                'status' => 1,
                'is_verified' => 1,
                'address' => 'Toshkent, Chilanzar',
                'avatar' => '/admin/assets/img/avatars/admin.png',
            ]
        );

        // Provaider (role = 1)
        $provider = User::firstOrCreate(
            ['phone' => '+998901234568'], // Email o‘rniga phone
            [
                'full_name' => 'Provider User',
                'password' => bcrypt('provider123'),
                'role' => User::ROLE_PROVIDER,
                'status' => 1,
                'is_verified' => 1,
                'address' => 'Samarqand, Registon',
                'avatar' => '/admin/assets/img/avatars/provider.png',
            ]
        );

        // Oddiy Foydalanuvchi (role = 0)
        $user = User::firstOrCreate(
            ['phone' => '+998901234569'], // Email o‘rniga phone
            [
                'full_name' => 'Regular User',
                'password' => bcrypt('user123'),
                'role' => User::ROLE_USER,
                'status' => 1,
                'is_verified' => 1,
                'address' => 'Farg‘ona, Marg‘ilon',
                'avatar' => '/admin/assets/img/avatars/user.png',
            ]
        );

        // Konsolga chiqarish
        echo "Admin yaratildi: +998901234567 / admin123\n";
        echo "Provaider yaratildi: +998901234568 / provider123\n";
        echo "Oddiy Foydalanuvchi yaratildi: +998901234569 / user123\n";
    }
}
