<?php

use App\Models\Categories;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = database_path('seeds/csv/categories.csv');
        $excel = App::make('excel');
        Categories::truncate();
        $data = $excel->load($csv, function($reader) {
            $results = $reader->all();
            foreach($results as $row) {
                Categories::updateOrCreate([
                    'category_name' => $row->categories
                ], [
                    'category_desc' => $row->description
                ]);
            }
        });
    }
}
