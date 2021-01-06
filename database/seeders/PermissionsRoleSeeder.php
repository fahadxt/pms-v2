<?php

namespace Database\Seeders;


use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsRoleSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {

        $permissions = [
            'viewAny',
            'view',
            'create',
            'update',
            'delete',
            'restore',
            'forceDelete',
        ];

        $models = [
            'projects',
            'tasks',
        ];


        // Create permissions auto
            $permissions_array = [];
            foreach ($models as  $model) {
                foreach ($permissions as $key){
                    $permissions_array[ $model . $key] = Permission::firstOrCreate([
                        'name'        => $model . '.' . $key,
                        'display_name' => $model . ' ' . $key,
                        'description' => $model,
                    ]);
                }
            }
        //

        // dump($permissions_array['projectsviewAny']->id);
        // Create super admin role and attach permissions
            $superadmin = Role::create([
                'name'       => 'super_admin',
                'display_name'       => 'Super Admin',
                'description'       => 'Super admin role has full access',
            ]);

            foreach($permissions_array as $val){
                $superadmin->attachPermissions([$val->id]);
            }
        //


        // // Create admin role and attach permissions
            $admin = Role::create([
                'name'       => 'admin',
                'display_name'       => 'Admin',
                'description'       => 'Admin role has all permissions except forceDelete and restore',
            ]);

            
            $admin->attachPermissions([
                $permissions_array['projectsviewAny']->id,
                $permissions_array['projectsview']->id,
                $permissions_array['projectscreate']->id,
                $permissions_array['projectsupdate']->id,
                $permissions_array['projectsdelete']->id,

                $permissions_array['tasksviewAny']->id,
                $permissions_array['tasksview']->id,
                $permissions_array['taskscreate']->id,
                $permissions_array['tasksupdate']->id,
                $permissions_array['tasksdelete']->id,
            ]);
        //


        // Create leader role and attach permissions
            $leader = Role::create([
                'name'       => 'leader',
                'display_name'       => 'Leader',
                'description'       => 'Leader can viewAny, view, create, update and delete tasks & viewAny and view projects',
            ]);

            $leader->attachPermissions([
                $permissions_array['projectsviewAny'],
                $permissions_array['projectsview'],

                $permissions_array['tasksviewAny'],
                $permissions_array['tasksview'],
                $permissions_array['taskscreate'],
                $permissions_array['tasksupdate'],
                $permissions_array['tasksdelete'],
            ]);
        //


        // Create employee role and attach permissions
            $employee = Role::create([
                'name'       => 'employee',
                'display_name'       => 'Employee',
                'description'       => 'Employee can viewAny, view, and update tasks & viewAny and view projects',
            ]);

            $employee->attachPermissions([
                $permissions_array['projectsviewAny'],
                $permissions_array['projectsview'],

                $permissions_array['tasksviewAny'],
                $permissions_array['tasksview'],
                $permissions_array['tasksupdate'],
            ]);
        //
    }
}
