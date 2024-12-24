<?php 
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear el usuario administrador y asignar el rol de 'admin'
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'fecha_ingreso' => now(),
            'estado' => '1',
            'remember_token' => Str::random(10),
        ]);
     

        // Crear el usuario Maria y asignar el rol de 'secretaria'
        $secretaria = User::create([
            'name' => 'maria',
            'email' => 'maria@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'fecha_ingreso' => now(),
            'estado' => '1',
            'remember_token' => Str::random(10),
        ]);
  

        // Crear un usuario para el rol de 'estudiante'
        $estudiante = User::create([
            'name' => 'Juan',
            'email' => 'juan@estudiante.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'fecha_ingreso' => now(),
            'estado' => '1',
            'remember_token' => Str::random(10),
        ]);


        // Crear un usuario para el rol de 'docente'
        $docente = User::create([
            'name' => 'Pedro',
            'email' => 'pedro@docente.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'fecha_ingreso' => now(),
            'estado' => '1',
            'remember_token' => Str::random(10),
        ]);
       

        // Crear un usuario para el rol de 'grupo de investigación'
        $grupoInvestigacion = User::create([
            'name' => 'Investigacion',
            'email' => 'grupo@investigacion.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'fecha_ingreso' => now(),
            'estado' => '1',
            'remember_token' => Str::random(10),
        ]);
       // Asignar el rol de grupo de investigación
    }
}
