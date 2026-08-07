<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Roles
        $roleSuperadmin = Role::firstOrCreate(['name' => 'superadmin']);
        $roleAdmin = Role::firstOrCreate(['name' => 'admin_desa']);
        $roleBumdes = Role::firstOrCreate(['name' => 'bumdes']);
        $roleKades = Role::firstOrCreate(['name' => 'kepala_desa']);

        // Create Default Users and Assign Roles
        
        // Superadmin
        $superadmin = User::firstOrCreate(
            ['email' => 'superadmin@cigalontang.desa.id'],
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('password123'),
                'role' => 'superadmin',
            ]
        );
        $superadmin->assignRole($roleSuperadmin);

        // Admin Desa
        $admin = User::firstOrCreate(
            ['email' => 'admin@cigalontang.desa.id'],
            [
                'name' => 'Admin Desa Cigalontang',
                'password' => Hash::make('password123'),
                'role' => 'admin_desa',
            ]
        );
        $admin->assignRole($roleAdmin);

        // Bumdes
        $bumdes = User::firstOrCreate(
            ['email' => 'bumdes@cigalontang.desa.id'],
            [
                'name' => 'Pengurus BUMDes',
                'password' => Hash::make('password123'),
                'role' => 'bumdes',
            ]
        );
        $bumdes->assignRole($roleBumdes);

        // Kades
        $kades = User::firstOrCreate(
            ['email' => 'kades@cigalontang.desa.id'],
            [
                'name' => 'Kepala Desa',
                'password' => Hash::make('password123'),
                'role' => 'kepala_desa',
            ]
        );
        $kades->assignRole($roleKades);
    }
}
