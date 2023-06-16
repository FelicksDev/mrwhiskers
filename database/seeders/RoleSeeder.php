<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
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
        //|
        $rolUsuario = Role::create(['name' => 'admin', 'guard_name' => 'web']);

        $rolCliente = Role::create(['name' => 'cliente', 'guard_name' => 'web',]);

        // Permisos para el guard 'web'
        Permission::create(['name' => 'admin'])->syncRoles([$rolUsuario]);
        Permission::create(['name' => 'admin.home'])->syncRoles([$rolUsuario]);
        Permission::create(['name' => 'admin.calendar.index'])->syncRoles([$rolUsuario]);
        Permission::create(['name' => 'admin.clientes.index'])->syncRoles([$rolUsuario]);
        Permission::create(['name' => 'admin.reservarCita.index'])->syncRoles([$rolUsuario]);
        Permission::create(['name' => 'admin.calendar.create'])->syncRoles([$rolUsuario]);
        Permission::create(['name' => 'admin.calendar.edit'])->syncRoles([$rolUsuario]);
        Permission::create(['name' => 'admin.calendar.destroy'])->syncRoles([$rolUsuario]);

        // Permisos para el guard 'administrador'
/*         Permission::create(['name' => 'user.reservarCita.index', 'guard_name' => 'administrador'])->syncRoles([$rolCliente]);
        Permission::create(['name' => 'user', 'guard_name' => 'administrador'])->syncRoles([$rolCliente]); */
        //dump($rolCliente->getPermissionNames());
    }
}