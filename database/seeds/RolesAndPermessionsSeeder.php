<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;


class RolesAndPermessionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // to reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //give all permissions to admin
        $role1 = Role::create(['guard_name' => 'admin', 'name' => 'admin']);
        $role1->givePermissionTo(Permission::all());


        //doctor role
        $role2 = Role::create(['guard_name' => 'pharmacy', 'name' => 'pharmacy']);
        $role3 = Role::create(['guard_name' => 'doctor', 'name' => 'doctor']);
        $role4 = Role::create(['guard_name' => 'web', 'name' => 'user']);
        
        

       // doctor permissions
    //    $pd0=Permission::create(['name' => 'create doctor']);
    //    $pd1=Permission::create(['name' => 'edit doctor']);
    //    $pd2=Permission::create(['name' => 'delete doctor']);
    //    $pd3=Permission::create(['name' => 'show doctor']);
    //    $pd4=Permission::create(['name' => 'ban doctor']);


    //    //pharmacy permission
    //    $pp0=Permission::create(['name' => 'create pharmacy']);
    //    $pp1=Permission::create(['name' => 'delete pharmacy']);
    //    $pp2=Permission::create(['name' => 'show pharmacy']);
    //    $pp3=Permission::create(['name' => 'edit pharmacy']);
       
    //    //user permission
    //    $pu0=Permission::create(['name' => 'edit user']);
    //    $pu1=Permission::create(['name' => 'show user']);
    //    $pu2=Permission::create(['name' => 'delete user']);

       
    //   //order permission
    //   $po0=Permission::create(['name' => 'create order']);
    //   $po1=Permission::create(['name' => 'show order']);
    //   $po2=Permission::create(['name' => 'edit order']);
    //   $po3=Permission::create(['name' => 'delete order']);

    //   //medicine permission
    //   $pm0=Permission::create(['name' => 'create medicine']);
    //   $pm1=Permission::create(['name' => 'show medicine']);
    //   $pm2=Permission::create(['name' => 'edit medicine']);
    //   $pm3=Permission::create(['name' => 'delete medicine']);

    //   //revenue permission
    //   $pr0=Permission::create(['name' => 'show revenue']);

    //   //assigning roles to permissions
    //    $role2->syncPermissions([$pd0,$pd1,$pd2,$pd3,$pd4,$pp2,$pp3,$po0,$po1,$po2,$po3,$pm0,$pm1,$pm2,$pm3,$pr0]);
    //    $role3->syncPermissions([$po0,$po1,$po2,$po3]);
    }
}
