<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Luluk',
            'email' => 'luluk@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $role = Role::create(['name' => 'Penarik']);

        $permissions = Permission::whereIn('name', [
            'profile-view',
            'profile-edit'
        ])->pluck('id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
