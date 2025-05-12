<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use App\Models\Permission;
use App\Models\RolePermission;

class SaveRoutesToDB extends Command
{
    protected $signature = 'routes:save';
    protected $description = 'Barcha route-larni permissions jadvaliga saqlaydi va SuperAdminga ruxsat beradi';

    public function handle()
    {
        $routes = Route::getRoutes();
        $superAdminRoleId = 1; // SuperAdmin roli uchun ID

        foreach ($routes as $route) {
            $name = $route->getName(); // Route nomi

            if ($name && !Permission::where('route_name', $name)->exists()) {
                $permission = Permission::create([
                    'name' => ucwords(str_replace('.', ' ', $name)), // Masalan: users.index -> Users Index
                    'route_name' => $name,
                ]);

                // SuperAdmin roliga ushbu route uchun ruxsat qo'shish
                RolePermission::firstOrCreate([
                    'role_id' => $superAdminRoleId,
                    'permission_id' => $permission->id
                ], [
                    'route_name' => $name,
                    'status' => 1,
                ]);
            }
        }

        $this->info("Barcha route-lar permissions jadvaliga saqlandi va SuperAdminga ruxsat berildi!");
    }
}
