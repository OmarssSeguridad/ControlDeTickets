<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Usuario::class,10)->create();
          factory(App\Tickets::class,10)->create();
          
       //   factory(App\Cargo::class,10)->create();
       /*   factory(App\Departamento::class,10)->create();
          factory(App\Respuestas::class,10)->create();
          factory(App\Sucursal::class,10)->create();
          factory(App\Tickets::class,10)->create();
          factory(App\Usuario::class,10)->create();*/
    }
}
