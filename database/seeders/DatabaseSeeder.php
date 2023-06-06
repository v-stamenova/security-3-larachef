<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User'
        //     'email' => 'test@example.com',
        // ]);

        $role = Role::create(['name' => 'writer']);

        $operations = ['edit', 'create', 'delete'];
        foreach ($operations as $operation) {
            $role->givePermissionTo(Permission::create(['name' => $operation . ' recipe']));
        }

        $role = Role::create(['name' => 'admin']);

        $operations = ['view', 'delete'];
        foreach ($operations as $operation) {
            $role->givePermissionTo(Permission::create(['name' => $operation . ' users']));
        }

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'admin@hz.nl',
            'password' =>  Hash::make('787VNZzr4u9^')
        ]);

        $user->assignRole('admin', 'writer');
    }
}
