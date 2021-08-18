<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


     app()['cache']->forget('spatie.permission.cache');
       
        Permission::create(['name' => 'VIEW USER']);
        Permission::create(['name' => 'CREATE USER']);
        Permission::create(['name' => 'UPDATE USER']);
        Permission::create(['name' => 'DELETE USER']);
        
        Permission::create(['name' => 'VIEW PRODUCTO']);
        Permission::create(['name' => 'CREATE PRODUCTO']);
        Permission::create(['name' => 'UPDATE PRODUCTO']);
        Permission::create(['name' => 'DELETE PRODUCTO']);
       

        Permission::create(['name' => 'VIEW CLIENTE']);
        Permission::create(['name' => 'CREATE CLIENTE']);
        Permission::create(['name' => 'UPDATE CLIENTE']);
        Permission::create(['name' => 'DELETE CLIENTE']);
       

        Permission::create(['name' => 'VIEW PROVEEDOR']);
        Permission::create(['name' => 'CREATE PROVEEDOR']);
        Permission::create(['name' => 'UPDATE PROVEEDOR']);
        Permission::create(['name' => 'DELETE PROVEEDOR']);
       

        Permission::create(['name' => 'VIEW INVENTARIO']);
        Permission::create(['name' => 'CREATE INVENTARIO']);
        Permission::create(['name' => 'UPDATE INVENTARIO']);
        Permission::create(['name' => 'DELETE INVENTARIO']);
       

        Permission::create(['name' => 'VIEW VENTA']);
        Permission::create(['name' => 'CREATE VENTA']);
        Permission::create(['name' => 'UPDATE VENTA']);
        Permission::create(['name' => 'DELETE VENTA']);
       

        Permission::create(['name' => 'VIEW COMPRA']);
        Permission::create(['name' => 'CREATE COMPRA']);
        Permission::create(['name' => 'UPDATE COMPRA']);
        Permission::create(['name' => 'DELETE COMPRA']);
       

        Permission::create(['name' => 'VIEW RESERVACION']);
        Permission::create(['name' => 'CREATE RESERVACION']);
        Permission::create(['name' => 'UPDATE RESERVACION']);
        Permission::create(['name' => 'DELETE RESERVACION']);
       

        Permission::create(['name' => 'VIEW SERVICIO']);
        Permission::create(['name' => 'CREATE SERVICIO']);
        Permission::create(['name' => 'UPDATE SERVICIO']);
        Permission::create(['name' => 'DELETE SERVICIO']);

        Permission::create(['name' => 'VIEW ESTADISTICA']);
        Permission::create(['name' => 'CREATE ESTADISTICA']);
        Permission::create(['name' => 'UPDATE ESTADISTICA']);
        Permission::create(['name' => 'DELETE ESTADISTICA']);

        Permission::create(['name' => 'VIEW SEGURIDAD']);
        Permission::create(['name' => 'CREATE SEGURIDAD']);
        Permission::create(['name' => 'UPDATE SEGURIDAD']);
        Permission::create(['name' => 'DELETE SEGURIDAD']);

        Permission::create(['name' => 'VIEW ROLES']);
        Permission::create(['name' => 'CREATE ROLES']);
        Permission::create(['name' => 'UPDATE ROLES']);
        Permission::create(['name' => 'DELETE ROLES']);


        //Administrador
       

        $role = Role::create(['name' => 'administrador']);
        $role->givePermissionTo(Permission::all());

        //empleados
        $role = Role::create(['name' => 'empleado']);
        $role->givePermissionTo('VIEW USER');
        $role->givePermissionTo('VIEW PRODUCTO');
        $role->givePermissionTo('VIEW CLIENTE');
        $role->givePermissionTo('CREATE CLIENTE');
        $role->givePermissionTo('UPDATE CLIENTE');
        $role->givePermissionTo('DELETE CLIENTE');
        $role->givePermissionTo('VIEW PROVEEDOR');
        $role->givePermissionTo('VIEW INVENTARIO');
        $role->givePermissionTo('VIEW VENTA');
        $role->givePermissionTo('CREATE VENTA');
        $role->givePermissionTo('UPDATE VENTA');
        $role->givePermissionTo('VIEW RESERVACION');
        $role->givePermissionTo('CREATE RESERVACION');
        $role->givePermissionTo('UPDATE RESERVACION');
        $role->givePermissionTo('DELETE RESERVACION');
        $role->givePermissionTo('VIEW SERVICIO');
        $role->givePermissionTo('VIEW ESTADISTICA');

        //mecanicos
        $role = Role::create(['name' => 'mecanico']);
        $role->givePermissionTo('VIEW RESERVACION');
        $role->givePermissionTo('VIEW SERVICIO');
        $role->givePermissionTo('VIEW ESTADISTICA');


  
    }
}
