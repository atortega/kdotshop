<?php

use Illuminate\Database\Seeder;

use App\Models\Colors;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = database_path('seeds/csv/colors.csv');
        $excel = App::make('excel');
        Colors::truncate();
        $data = $excel->load($csv, function($reader) {
            $results = $reader->all();
            foreach($results as $row) {
                Colors::updateOrCreate([
                    'color_id' => $row->id
                ], [
                    'color' => $row->code,
                    'description' => $row->desc,
                ]);
            }
        });
    }
}
