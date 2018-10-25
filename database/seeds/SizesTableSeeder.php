<?php

use Illuminate\Database\Seeder;

use App\Models\Sizes;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = database_path('seeds/csv/sizes.csv');
        $excel = App::make('excel');
        Sizes::truncate();
        $data = $excel->load($csv, function($reader) {
            $results = $reader->all();
            foreach($results as $row) {
                Sizes::updateOrCreate([
                    'size_id' => $row->id
                ], [
                    'size' => $row->code,
                    'description' => $row->desc,
                ]);
            }
        });
    }
}
