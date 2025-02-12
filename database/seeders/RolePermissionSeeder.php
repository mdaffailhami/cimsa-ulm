<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_has_permissions')->truncate();

        $list_permissions = [
            'sudo',

            'profile-management',
            'profile.*',
            'profile.create',
            'profile.update',
            'profile.delete',

            'user-management',
            'user.*',
            'user.create',
            'user.update',
            'user.soft-delete',
            'user.delete',

            'page-management',
            'page.*',
            'page.create',
            'page.update',
            'page-soft-delete',
            'page.delete',

            'page-content-management',
            'page-content.*',
            'page-content.create',
            'page-content.update',
            'page-content.delete',

            'post-management',
            'post.*',
            'post.create',
            'post.update',
            'post.soft-delete',
            'post.delete',

            'category-management',
            'category.*',
            'category.create',
            'category.update',
            'category.delete',

            'official-management',
            'official.*',
            'official.create',
            'official.update',
            'official.delete',

            'official-division-management',
            'official-division.*',
            'official-division.create',
            'official-division.update',
            'soft-delete',
            'official-division.delete',

            'official-division-member-management',
            'official-division-member.*',
            'official-division-member.create',
            'official-division-member.update',
            'official-division-member.delete',

            'program-management',
            'program.*',
            'program.create',
            'program.update',
            'program.soft-delete',
            'program.delete',

            'committe-management',
            'committe.*',
            'committe.create',
            'committe.update',
            'committe.soft-delete',
            'committe.delete',

            'committe-detail-management',
            'committe-detail.*',
            'committe-detail.create',
            'committe-detail.update',
            'committe-soft-delete',
            'committe-detail.delete',

            'training-management',
            'training.*',
            'training.create',
            'training.update',
            'training.delete',

            'role-management',
            'role.*',
            'role.create',
            'role.update',
            'role.delete'
        ];

        $list_role = [
            [
                "name" => 'super-administrator',
                'permissions' => [
                    'sudo',
                ]
            ],
            [
                "name" => 'administrator',
                'permissions' => [
                    'profile-management',
                    'profile.update',

                    'user-management',
                    'user.*',

                    'page-management',

                    'page-content-management',
                    'page-content.update',

                    'post-management',
                    'post.*',

                    'category-management',
                    'category.*',

                    'official-management',
                    'official.*',

                    'official-division-management',
                    'official-division.*',

                    'official-division-member-management',
                    'official-division-member.*',

                    'program-management',
                    'program.*',

                    'committe-management',
                    'committe.*',

                    'committe-detail-management',
                    'committe-detail.*',

                    'training-management',
                    'training.*',

                    'role-management',
                    'role.*'
                ]
            ],
            [
                "name" => 'member',
                'permissions' => [
                    'post-management',
                    'post.*',

                    'official-management',
                    'official.*',

                    'official-division-management',
                    'official-division.*',

                    'official-division-member-management',
                    'official-division-member.*',

                    'official-management',
                    'official.*',

                    'program-management',
                    'program.*',

                    'committe-management',
                    'committe.*',

                    'committe-detail-management',
                    'committe-detail.*',

                    'training-management',
                    'training.update',
                    'training.delete',
                ]
            ],
        ];

        DB::beginTransaction();

        try {
            foreach ($list_permissions as $permission_data) {
                $permission = $this->createPermission($permission_data);
            }


            foreach ($list_role as $role_data) {
                $role =  Role::where('name', $role_data['name'])->first();

                if (!$role) {
                    $role = $this->createRole($role_data);
                }

                $role->syncPermissions($role_data['permissions']);
            }

            DB::commit();
        } catch (\Throwable $th) {
            Db::rollBack();
            echo $th->getMessage();
        }
    }

    protected function createRole($data)
    {
        $role = Role::where('name', $data)->first();

        if (!$role) {
            $role = Role::create([
                'name' => $data['name']
            ]);
        } else {
            $role = $role->update([
                'name' => $data['name']
            ]);
        }

        return $role;
    }

    protected function createPermission($data)
    {
        $permission = Permission::where('name', $data)->first();

        if (!$permission) {
            $permission = Permission::create([
                'name' => $data
            ]);
        } else {
            $permission = $permission->update([
                'name' => $data
            ]);
        }

        return $permission;
    }
}
