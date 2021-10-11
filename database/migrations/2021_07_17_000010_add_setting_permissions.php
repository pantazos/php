<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Permission;
use App\Models\Role;

class AddSettingPermissions extends Migration
{
    public function up()
    {
        $setting_permissions = [
            [
                'title' => 'setting_create',
            ],
            [
                'title' => 'setting_edit',
            ],
            [
                'title' => 'setting_delete',
            ],
            [
                'title' => 'setting_access',
            ]
        ];
        Permission::insert($setting_permissions);

        $admin_permissions = Permission::all();
        Role::byKey(Role::ADMIN)->firstOrFail()->permissions()->sync($admin_permissions->pluck('id'));
    }
}
