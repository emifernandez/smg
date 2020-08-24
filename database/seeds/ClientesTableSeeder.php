<?php

use JeroenZwart\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Seeder;

class ClientesTableSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeds/csvs/clientes.csv';
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
        //$sql = file_get_contents(database_path() . '/seeds/clientes.sql');
    
        //DB::statement($sql);
    }
}
