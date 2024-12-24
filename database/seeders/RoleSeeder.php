<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear roles
        $admin = Role::create(['name' => 'admin']);
        $secretaria = Role::create(['name' => 'secretaria']);
        $estudiante = Role::create(['name' => 'estudiante']);
        $docente = Role::create(['name' => 'docente']);
        $grupoInvestigacion = Role::create(['name' => 'grupoinvestigacion']);
        
        // Crear permisos y asignarlos a los roles correspondientes
        Permission::create(['name' => 'index'])->syncRoles([$admin, $secretaria, $estudiante, $docente, $grupoInvestigacion]);
        Permission::create(['name' => 'reportes'])->syncRoles([$admin, $secretaria, $docente, $estudiante]);
        Permission::create(['name' => 'pdf'])->syncRoles([$admin, $secretaria, $estudiante]);
        Permission::create(['name' => 'pdf_fechas'])->syncRoles([$admin, $docente, $estudiante]);
        Permission::create(['name' => 'home'])->syncRoles([$admin, $estudiante, $docente, $grupoInvestigacion]);
        Permission::create(['name' => 'miembros'])->syncRoles([$admin, $estudiante]);
        Permission::create(['name' => 'ministerios'])->syncRoles([$admin, $estudiante]);
        Permission::create(['name' => 'usuarios'])->syncRoles([$admin, $estudiante]);
        Permission::create(['name' => 'asistencias'])->syncRoles([$admin, $docente, $estudiante]);
        
        // Agregar permisos adicionales de ejemplo (can adicionales)
        Permission::create(['name' => 'processes'])->syncRoles([$admin, $docente]);
        Permission::create(['name' => 'research_groups'])->syncRoles([$admin, $grupoInvestigacion, $docente]);
        Permission::create(['name' => 'research_lines'])->syncRoles([$admin, $grupoInvestigacion]);
        Permission::create(['name' => 'students'])->syncRoles([$admin, $estudiante]);
        Permission::create(['name' => 'deliverables'])->syncRoles([$admin, $docente, $estudiante]);
        Permission::create(['name' => 'phases'])->syncRoles([$admin, $docente]);
        Permission::create(['name' => 'search_databases'])->syncRoles([$admin, $docente, $grupoInvestigacion]);
        Permission::create(['name' => 'student_phase_database_counts'])->syncRoles([$admin, $docente, $grupoInvestigacion]);

        // Asignar todos los permisos al rol de administrador
        $allPermissions = Permission::all();
        $admin->syncPermissions($allPermissions);

        // Asignar roles a los usuarios (asegúrate de que los usuarios existan con estos IDs)
        User::find(1)->assignRole($admin);  // Usuario 1 -> admin
        User::find(2)->assignRole($secretaria);  // Usuario 2 -> secretaria
        User::find(3)->assignRole($estudiante);  // Usuario 3 -> estudiante
        User::find(4)->assignRole($docente);  // Usuario 4 -> docente
        User::find(5)->assignRole($grupoInvestigacion);  // Usuario 5 -> grupo de investigación
    }
}
