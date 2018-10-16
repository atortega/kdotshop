<?php

use App\Models\Country;

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = database_path('seeds/csv/countries.csv');
        $excel = App::make('excel');

        $data = $excel->load($csv, function($reader) {
            $results = $reader->all();
            foreach($results as $row) {
                Country::updateOrCreate([
                    'code' => $row->code
                ], [
                    'name' => $row->name
                ]);
            }
        });
    }
}
