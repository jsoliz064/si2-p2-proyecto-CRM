<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Empresa']);
        $role3 = Role::create(['name' => 'Empleado']);

 	    Permission::create(['name'=>'admin'])->syncRoles([$role1]);
 	    Permission::create(['name'=>'empresa'])->syncRoles([$role1,$role2]);
 	    //Permission::create(['name'=>'empleado'])->syncRoles([$role1,$role2,$role3]);
        //USUARIOS-------------------------------------------------------------------------------                    
        Permission::create(['name' => 'users.index',
                            'description' => 'Ver lista de Usuarios'])->syncRoles($role1,$role2);
                            
        Permission::create(['name' => 'users.create',
                            'description' => 'Crear Usuarios'])->syncRoles($role1,$role2);

        Permission::create(['name' => 'users.edit',
                            'description' => 'Editar Usuarios'])->syncRoles($role1,$role2);
        
        //CLIENTES-------------------------------------------------------------------------------
        Permission::create(['name' => 'clientes.index',
                            'description' => 'Ver lista de Clientes'])->syncRoles($role1,$role2,$role3);

        Permission::create(['name' => 'clientes.create',
                            'description' => 'Crear clientes'])->syncRoles($role1,$role2,$role3);

        Permission::create(['name' => 'clientes.edit',
                            'description' => 'Editar Clientes'])->syncRoles($role1,$role2,$role3);

        Permission::create(['name' => 'clientes.show',
                            'description' => 'Informacion de clientes'])->syncRoles($role1,$role2,$role3);

        Permission::create(['name' => 'clientes.destroy',
                            'description' => 'Eliminar clientes'])->syncRoles($role1,$role2);

        //ROLES-------------------------------------------------------------------------------
        Permission::create(['name' => 'roles.index',
                            'description' => 'Ver lista de Roles'])->syncRoles($role1,$role2);     
        Permission::create(['name' => 'roles.create',
                            'description' => 'Crear Roles'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'roles.edit',
                            'description' => 'Editar Roles'])->syncRoles($role1,$role2); 
        Permission::create(['name' => 'roles.destroy',
                            'description' => 'Eliminar Roles'])->syncRoles($role1,$role2); 
        //Bitacora-------------------------------------------------------------------------------                     
         Permission::create(['name' => 'bitacora.index',
                            'description' => 'Ver lista de Bitacora'])->syncRoles($role1,$role2);                                                       

        //reportes -------------------------------------------------------------------------------                     
        Permission::create(['name' => 'reporte_date',
                            'description' => 'reporte de Ventas'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'reporte_resultados',
                            'description' => 'actualizacion de reportes de ventas'])->syncRoles($role1,$role2);                            
        Permission::create(['name' => 'reporteCompra_date',
                            'description' => 'reporte de Compras'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'reporteCompra_resultados',
                            'description' => 'actualizacion de reportes de compras'])->syncRoles($role1,$role2);   
    }
}
