<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'view list users']);
        Permission::create(['name' => 'add users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'view list clients']);
        Permission::create(['name' => 'add clients']);
        Permission::create(['name' => 'edit clients']);
        Permission::create(['name' => 'delete clients']);

        Permission::create(['name' => 'view list categories']);
        Permission::create(['name' => 'add categories']);
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'delete categories']);

        Permission::create(['name' => 'view list posts']);
        Permission::create(['name' => 'add posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'view post']);
        Permission::create(['name' => 'update_post_link']);
        Permission::create(['name' => 'update_images']);


        $content_creator = Role::create(['name' => 'content creator']);
        $content_creator->syncPermissions([
            'view list posts', 
            'add posts', 
            'edit posts', 
            'delete posts', 
            'view post',
            'update_post_link',
            'update_images',
            'view list categories', 
            'add categories', 
            'edit categories', 
            'delete categories', 
        ]);

        $designer = Role::create(['name' => 'designer']);
        $designer->syncPermissions([
            'view list posts', 
            'add posts', 
            'view post',
            'update_post_link',
            'update_images',
        ]);

        $user_content_creator = User::create([
            'email' => 'content_creator@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'status' => 'active',
        ]);
        $user_content_creator->assignRole($content_creator);


        $user_designer = User::create([
            'email' => 'designer@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'status' => 'active',
        ]);

        $user_super_admin = User::create([
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'status' => 'active',
        ]);

        $super_admin = Role::create(['name' => 'super admin']);
        $user_super_admin->assignRole($super_admin);
    }
}
