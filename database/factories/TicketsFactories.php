<?php

use Faker\Generator as Faker;

$factory->define(App\Usuario::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'sucursal' => $faker->unique()->safeEmail,
        'asunto' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'detalle' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'status' => $faker->randomElement(['ALTA','PROCESO','FINALIZADO']),
        
    ];
});


   