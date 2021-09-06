<?php
namespace Database\Seeders;
use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class HouseSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'houses';
        $this->csv_delimiter = ',';
        $this->timestamps = false;
        $this->filename = base_path().'/database/seeders/csvs/Houses.csv';
    }
    public function run()
    {
        DB::table($this->table)->truncate();
        parent::run();
    }
}