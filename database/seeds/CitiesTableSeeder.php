<?php

use App\Models\Cities;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = database_path('seeds/csv/cities.csv');
        $excel = App::make('excel');

        $data = $excel->load($csv, function($reader) {
            $results = $reader->all();
            foreach($results as $row) {
                Cities::updateOrCreate([
                	'id' => $row->id
                ], [
                	'cities' =>$row->cities
                   
                ]);
            }
        });
    }
}
