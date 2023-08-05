<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $defaultPermissions = ['lead-management', 'create-admin', 'user-management'];
        foreach ($defaultPermissions as $permission){
            Permission::create(['name' => $permission]);
        }

        $this->create_user_with_role('Super Admin', 'Super Admin', 'super-admin@permission.test', 'password');
        $this->create_user_with_role('Communication', 'Communication', 'communication@permission.test', '123456');
        $this->create_user_with_role('Leads', 'Leads', 'leads@permission.test', '123456');
        $this->create_user_with_role('Teacher', 'Teacher', 'teacher@permission.test', '123456');

        Lead::factory(100)->create();
    }

    protected function create_user_with_role($type, $name, $email, $password){
        $role = Role::create([
           'name' => $type,
        ]);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        if($type == 'Super Admin'){
            $role->givePermissionTo(Permission::all());
        } elseif($type == 'Leads'){
            $role->givePermissionTo('lead-management');
        }

        $user->assignRole($role);

        return $user;
    }
}
