<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(80)->create();
        //$this->call(RolSeeder::class);
        //\App\Models\pedidos::factory(35)->create();
        //\App\Models\tipoempleados::factory(35)->create();
        //\App\Models\empleados::factory(40)->create();
        //\App\Models\informacionclientes::factory(35)->create();
        
        \App\Models\productos::factory(35)->create();
        //\App\Models\productcategorias::factory(35)->create();
        //\App\Models\proveedores::factory(35)->create();
    }
}
