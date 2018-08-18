<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Usuario::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'departamento' => $faker->randomElement(['Sistemas','Contabilidad','Ventas']),
        'cargo' => $faker->randomElement(['Gerente','Auxiliar','CEO']),
        'telefono' => $faker->randomDigit(),
        'direccion' => $faker->address,
        'sucursal' => $faker->randomElement(['Matriz','Power Motor','Motor World']),
        'noEmpleado' => $faker->randomDigit(),
        'password' => '123456', // secret
        'remember_token' => str_random(10),
    ];
});

