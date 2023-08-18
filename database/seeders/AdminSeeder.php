<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('12345678')
        ]);
    

        $role = Role::create([
            'name' => 'admin',
            'guard_name' => "admin"
        ]);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $admin->assignRole([$role->id]);
    }
}