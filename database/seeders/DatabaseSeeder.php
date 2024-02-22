<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Dedi Rosadi',
            'email' => 'dedir8361@gmail.com',
            'password' => bcrypt('04April2001-')
        ]);

        $this->call(UserRolePermissionSeeder::class);
    }
}
