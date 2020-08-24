<?php
use JeroenZwart\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class Ventas_detalles_modalidadesTableSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeds/csvs/ventas_detalles_modalidades.csv';
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
