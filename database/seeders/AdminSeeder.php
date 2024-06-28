<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('name', 'Admin')->first();
        $admin = User::where('email', 'admin@gmail.com')->first();
        if (is_null($admin)) {

            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => $role->id,
            ]);
            $admin->syncRoles('Admin');
        }
    }
}
