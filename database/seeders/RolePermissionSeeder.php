<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Define the permissions for each model
        $permissions = [
            // Permissions for managing Users
            'view_any_user', 'view_user', 'create_user', 'update_user', 'delete_user',
            'delete_any_user', 'force_delete_user', 'force_delete_any_user', 'restore_user',
            'restore_any_user', 'replicate_user', 'reorder_user',

            // Permissions for managing Students
            'view_any_student', 'view_student', 'create_student', 'update_student', 'delete_student',
            'delete_any_student', 'force_delete_student', 'force_delete_any_student', 'restore_student',
            'restore_any_student', 'replicate_student', 'reorder_student',

            // Permissions for managing Invoices
            'view_any_invoice', 'view_invoice', 'create_invoice', 'update_invoice', 'delete_invoice',
            'delete_any_invoice', 'force_delete_invoice', 'force_delete_any_invoice', 'restore_invoice',
            'restore_any_invoice', 'replicate_invoice', 'reorder_invoice',

            // Permissions for managing Clubs
            'view_any_club', 'view_club', 'create_club', 'update_club', 'delete_club', 'delete_any_club',
            'force_delete_club', 'force_delete_any_club', 'restore_club', 'restore_any_club', 'replicate_club',
            'reorder_club',

            // Permissions for managing Club Memberships
            'view_any_club_membership', 'view_club_membership', 'create_club_membership', 'update_club_membership',
            'delete_club_membership', 'delete_any_club_membership', 'force_delete_club_membership',
            'force_delete_any_club_membership', 'restore_club_membership', 'restore_any_club_membership',
            'replicate_club_membership', 'reorder_club_membership',

            // Permissions for managing Events
            'view_any_event', 'view_event', 'create_event', 'update_event', 'delete_event', 'delete_any_event',
            'force_delete_event', 'force_delete_any_event', 'restore_event', 'restore_any_event', 'replicate_event',
            'reorder_event',


            'view_any_role', 'view_role', 'create_role', 'update_role', 'delete_role',
            'delete_any_role', 'force_delete_role', 'force_delete_any_role',
            'restore_role', 'restore_any_role', 'replicate_role', 'reorder_role',
        ];

        // Create the permissions using Spatie's Permission package
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Define roles and their corresponding permissions
        $roles = [
            'Super_Admin' => [
                'view_any_user', 'view_user', 'create_user', 'update_user', 'delete_user', 'delete_any_user',
                'force_delete_user', 'force_delete_any_user', 'restore_user', 'restore_any_user', 'replicate_user',
                'reorder_user',

                'view_any_student', 'view_student', 'create_student', 'update_student', 'delete_student',
                'delete_any_student', 'force_delete_student', 'force_delete_any_student', 'restore_student',
                'restore_any_student', 'replicate_student', 'reorder_student',

                'view_any_invoice', 'view_invoice', 'create_invoice', 'update_invoice', 'delete_invoice',
                'delete_any_invoice', 'force_delete_invoice', 'force_delete_any_invoice', 'restore_invoice',
                'restore_any_invoice', 'replicate_invoice', 'reorder_invoice',

                'view_any_club', 'view_club', 'create_club', 'update_club', 'delete_club', 'delete_any_club',
                'force_delete_club', 'force_delete_any_club', 'restore_club', 'restore_any_club', 'replicate_club',
                'reorder_club',

                'view_any_club_membership', 'view_club_membership', 'create_club_membership', 'update_club_membership',
                'delete_club_membership', 'delete_any_club_membership', 'force_delete_club_membership',
                'force_delete_any_club_membership', 'restore_club_membership', 'restore_any_club_membership',
                'replicate_club_membership', 'reorder_club_membership',

                'view_any_event', 'view_event', 'create_event', 'update_event', 'delete_event', 'delete_any_event',
                'force_delete_event', 'force_delete_any_event', 'restore_event', 'restore_any_event', 'replicate_event',
                'reorder_event',

                'view_any_role', 'view_role', 'create_role', 'update_role', 'delete_role',
                'delete_any_role', 'force_delete_role', 'force_delete_any_role', 'restore_role', 
                'restore_any_role', 'replicate_role',
            ],
            'Admin' => [
                'view_any_user', 'view_user', 'create_user', 'update_user', 'delete_user',
                'view_any_student', 'view_student', 'create_student', 'update_student', 'delete_student',
                'view_any_invoice', 'view_invoice', 'create_invoice', 'update_invoice', 'delete_invoice',
                'view_any_club', 'view_club', 'create_club', 'update_club', 'delete_club',
                'view_any_event', 'view_event', 'create_event', 'update_event', 'delete_event', 'view_any_role', 'view_role', 'create_role', 'update_role', 'delete_role',
                'delete_any_role', 'force_delete_role', 'force_delete_any_role', 'restore_role', 'restore_any_role', 'replicate_role', 'reorder_role',
            ],
            'President' => [
                'view_any_event', 'view_event', 'create_event', 'update_event', 'delete_event',
                'view_any_club', 'view_club', 'create_club', 'update_club', 'delete_club',
                'view_any_student', 'view_student', 'update_student',
            ],
            'Vice-President' => [
                'view_any_event', 'view_event', 'create_event', 'update_event',
                'view_any_club', 'view_club', 'create_club', 'update_club',
            ],
            'Treasurer' => [
                'view_any_invoice', 'view_invoice', 'create_invoice', 'update_invoice',
            ],
            'Secretary' => [
                'view_any_club_membership', 'view_club_membership', 'update_club_membership',
            ],
            'Auditor' => [
                'view_any_event', 'view_event', 'view_any_invoice', 'view_invoice',
            ],
            'PIO' => [
                'view_any_event', 'view_event', 'view_any_club', 'view_club',
            ],
        ];

        // Create roles and assign permissions
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }

        // Create Super Admin user and assign the Super Admin role
        $superAdminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'),
            ]
        );
        $superAdminUser->assignRole('Super_Admin');

        $this->command->info('Roles and Permissions have been successfully seeded for all models!');
    }
}
