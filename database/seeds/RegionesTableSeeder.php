<?php

use JeroenZwart\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Seeder;

class RegionesTableSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeds/csvs/regiones.csv';
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
