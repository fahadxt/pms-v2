<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create', 'display_name' => 'إنشاء']);
        Permission::create(['name' => 'update', 'display_name' => 'تعديل']);
        Permission::create(['name' => 'delete', 'display_name' => 'حذف']);


        // create roles and give it permissions
        $role = Role::create(['name' => 'super_admin', 'display_name' => 'المدير العام']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'admin', 'display_name' => 'المدير']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'user', 'display_name' => 'مستخدم']);
        $role->givePermissionTo(['create', 'update']);
       
    }
}
