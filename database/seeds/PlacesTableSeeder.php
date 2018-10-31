<?php

use App\Models\Places;
use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        $csv = database_path('seeds/csv/places.csv');
        $excel = App::make('excel');

        $data = $excel->load($csv, function($reader) {
            $results = $reader->all();
            foreach($results as $row) {
                Places::updateOrCreate([
                	'id' => $row->id
                ], [
                	'place' =>$row->place,
                    'km' => $row->km,
                    'shipping_fee' => $row->shipping_fee
                ]);
            }
        });
    }
}
