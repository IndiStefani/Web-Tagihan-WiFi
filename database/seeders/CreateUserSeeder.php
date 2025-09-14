<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // Buat Role jika belum ada
        // $role = Role::firstOrCreate(['name' => 'Penarik']);

        // // Ambil permission yang dibutuhkan
        // $permissions = Permission::whereIn('name', [
        //     'profile-view',
        //     'profile-edit'
        // ])->pluck('id')->all();

        // // Sinkronkan permission ke role
        // $role->syncPermissions($permissions);

        // // Buat 4 user acak dan assign role Penarik
        // for ($i = 1; $i <= 4; $i++) {
        //     $user = User::create([
        //         'name' => 'Penarik ' . $i,
        //         'email' => 'penarik' . $i . '@example.com',
        //         'password' => Hash::make('123456'), // atau bcrypt('123456')
        //         'email_verified_at' => now(),
        //         'remember_token' => Str::random(10),
        //     ]);

        //     $user->assignRole($role);
        // }

        $permissions = Permission::whereIn('name', [
            'profile-view',
            'profile-edit'
        ])->pluck('id')->all();

        // Data role dan user
        $data = [
            [
                'role' => 'Kalim',
                'user' => [
                    'name' => 'Kalim',
                    'username' => 'kalim',
                    'email' => 'kalim@example.com',
                ],
            ],
            [
                'role' => 'Luluk',
                'user' => [
                    'name' => 'Luluk',
                    'username' => 'luluk',
                    'email' => 'luluk@example.com',
                ],
            ],
            [
                'role' => 'Uliatin',
                'user' => [
                    'name' => 'Yanti',
                    'username' => 'yanti',
                    'email' => 'yanti@example.com',
                ],
            ],
        ];

        foreach ($data as $item) {
            // Buat role
            $role = Role::firstOrCreate(['name' => $item['role']]);
            $role->syncPermissions($permissions);

            // Buat user
            $user = User::firstOrCreate(
                ['email' => $item['user']['email']],
                [
                    'name' => $item['user']['name'],
                    'username' => $item['user']['username'],
                    'password' => Hash::make('12345678'),
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ]
            );

            // Assign role
            $user->assignRole($role);
        }
    }
}
