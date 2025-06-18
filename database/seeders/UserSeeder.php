<?php

namespace Database\Seeders;

use App\Models\User; // Importa el modelo User
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Para hashear contraseñas de forma segura

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Opción 1: Usando la Factory de Usuarios (Recomendado)
        // Laravel ya viene con una UserFactory por defecto.
        // Esto es ideal si necesitas crear muchos usuarios con datos variados.
        User::factory()->count(10)->create(); // Crea 10 usuarios falsos

        // Puedes crear un usuario específico si lo necesitas, por ejemplo, para admin
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Siempre hashea las contraseñas
        ]);


        // Opción 2: Creando usuarios manualmente con Faker (si no usas factories o para un control más granular)
        // Puedes descomentar este bloque si prefieres esta forma o si las factories no están configuradas.

        /*
        // Crea un usuario individual con Faker
        User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan.perez@example.com', // Correo específico
            'password' => Hash::make('password'),
        ]);

        // Crea varios usuarios con datos aleatorios usando Faker directamente
        $faker = \Faker\Factory::create('es_ES'); // Puedes especificar un locale (idioma/país) para datos más realistas

        for ($i = 0; $i < 5; $i++) { // Crea 5 usuarios adicionales
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail, // Genera un correo único y seguro
                'password' => Hash::make('password'), // Todos con la misma contraseña 'password'
            ]);
        }
        */
    }
}
