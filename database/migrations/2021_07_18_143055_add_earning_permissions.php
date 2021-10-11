<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Migrations\Migration;

class AddEarningPermissions extends Migration
{
    public function up()
    {
        $earning_permissions = [
            [
                'title' => 'earning_access',
            ],
        ];
        Permission::insert($earning_permissions);

        $admin_permissions = Permission::all();
        Role::byKey(Role::ADMIN)->firstOrFail()->permissions()->sync($admin_permissions->pluck('id'));
    }
}
