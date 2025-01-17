<?php

namespace Database\Seeders;

use App\Enums\RoleEnums;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'netland',
            'email' => 'admin@netland.com',
            'password' => Hash::make('password'),
            'role_id' => Role::where('name', RoleEnums::ADMIN)->first()->id,
        ]);
    }
}
