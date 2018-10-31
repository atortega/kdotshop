<?php

use App\Models\Provinces;
use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = database_path('seeds/csv/provinces.csv');
        $excel = App::make('excel');

        $data = $excel->load($csv, function($reader) {
            $results = $reader->all();
            foreach($results as $row) {
                Provinces::updateOrCreate([
                	'id' => $row->id
                ], [
                	'provinces' =>$row->provinces
                   
                ]);
            }
        });
    }
}
