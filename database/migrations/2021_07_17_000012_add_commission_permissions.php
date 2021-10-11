<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Permission;
use App\Models\Role;

class AddCommissionPermissions extends Migration
{
    public function up()
    {
        $commission_permissions = [
            [
                'title' => 'commission_create',
            ],
            [
                'title' => 'commission_edit',
            ],
            [
                'title' => 'commission_delete',
            ],
            [
                'title' => 'commission_access',
            ]
        ];
        Permission::insert($commission_permissions);

        $admin_permissions = Permission::all();
        Role::byKey(Role::ADMIN)->firstOrFail()->permissions()->sync($admin_permissions->pluck('id'));
    }
}
