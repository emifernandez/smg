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
        $this->call([
            ModalidadesTableSeeder::class,
            ClientesTableSeeder::class,
            Lista_precios_modalidadesTableSeeder::class,
            PaisesTableSeeder::class,
            RegionesTableSeeder::class,
            DistritosTableSeeder::class,
            BarriosTableSeeder::class,
            VentasTableSeeder::class,
            Ventas_detalles_modalidadesTableSeeder::class,
        ]);
        //$this->call(ClientesTableSeeder::class);
        //$this->call(ModalidadesTableSeeder::class);

    }
}
