<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();
        try {
            $admin = User::create(array_merge([
                'email' => 'admin@gmail.com',
                'name' => 'admin',
            ], $default_user_value));

            $peninjau = User::create(array_merge([
                'email' => 'peninjau@gmail.com',
                'name' => 'peninjau',
            ], $default_user_value));

            $ormawa = User::create(array_merge([
                'email' => 'ormawa@gmail.com',
                'name' => 'ormawa',
            ], $default_user_value));

            $umum = User::create(array_merge([
                'email' => 'umum@gmail.com',
                'name' => 'umum',
            ], $default_user_value));


            $role_admin = Role::create((['name' => 'admin']));
            $role_peninjau = Role::create((['name' => 'peninjau']));
            $role_ormawa = Role::create((['name' => 'ormawa']));
            $role_umum = Role::create((['name' => 'umum']));

            $permission = Permission::create(['name' => 'nav admin']);
            $permission = Permission::create(['name' => 'nav peninjau']);
            $permission = Permission::create(['name' => 'nav ormawa']);
            $permission = Permission::create(['name' => 'nav umum']);
            $permission = Permission::create(['name' => 'edit proposal']);
            $permission = Permission::create(['name' => 'periksa proposal']);
            $permission = Permission::create(['name' => 'only admin']);

            $admin->givePermissionTo('nav admin');
            $admin->givePermissionTo('edit proposal');
            $admin->givePermissionTo('periksa proposal');
            $admin->givePermissionTo('only admin');
            $peninjau->givePermissionTo('edit proposal');
            $peninjau->givePermissionTo('periksa proposal');
            $peninjau->givePermissionTo('nav peninjau');
            $ormawa->givePermissionTo('nav ormawa');
            $umum->givePermissionTo('nav umum');

            $admin->assignRole('admin');
            $peninjau->assignRole('peninjau');
            $ormawa->assignRole('ormawa');
            $umum->assignRole('umum');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
