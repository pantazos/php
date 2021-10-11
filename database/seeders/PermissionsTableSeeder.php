<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'title' => 'user_management_access',
            ],
            [
                'title' => 'permission_create',
            ],
            [
                'title' => 'permission_edit',
            ],
            [
                'title' => 'permission_show',
            ],
            [
                'title' => 'permission_delete',
            ],
            [
                'title' => 'permission_access',
            ],
            [
                'title' => 'role_create',
            ],
            [
                'title' => 'role_edit',
            ],
            [
                'title' => 'role_show',
            ],
            [
                'title' => 'role_delete',
            ],
            [
                'title' => 'role_access',
            ],
            [
                'title' => 'user_create',
            ],
            [
                'title' => 'user_edit',
            ],
            [
                'title' => 'user_show',
            ],
            [
                'title' => 'user_delete',
            ],
            [
                'title' => 'user_access',
            ],
            [
                'title' => 'category_create',
            ],
            [
                'title' => 'category_edit',
            ],
            [
                'title' => 'category_show',
            ],
            [
                'title' => 'category_delete',
            ],
            [
                'title' => 'category_access',
            ],
            [
                'title' => 'service_create',
            ],
            [
                'title' => 'service_edit',
            ],
            [
                'title' => 'service_show',
            ],
            [
                'title' => 'service_delete',
            ],
            [
                'title' => 'service_access',
            ],
            [
                'title' => 'status_create',
            ],
            [
                'title' => 'status_edit',
            ],
            [
                'title' => 'status_show',
            ],
            [
                'title' => 'status_delete',
            ],
            [
                'title' => 'status_access',
            ],
            [
                'title' => 'booking_create',
            ],
            [
                'title' => 'booking_edit',
            ],
            [
                'title' => 'booking_show',
            ],
            [
                'title' => 'booking_delete',
            ],
            [
                'title' => 'booking_access',
            ],
            [
                'title' => 'review_create',
            ],
            [
                'title' => 'review_edit',
            ],
            [
                'title' => 'review_show',
            ],
            [
                'title' => 'review_delete',
            ],
            [
                'title' => 'review_access',
            ],
            [
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
