<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Migrations\Migration;

class AddPayoutPermissions extends Migration
{
    public function up()
    {
        $payout_permissions = [
            [
                'title' => 'payout_create',
            ],
            [
                'title' => 'payout_access',
            ],
        ];
        Permission::insert($payout_permissions);

        $admin_permissions = Permission::all();
        Role::byKey(Role::ADMIN)->firstOrFail()->permissions()->sync($admin_permissions->pluck('id'));
    }
}
