<?php

use Illuminate\Database\Seeder;

use App\Models\SubCategories;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = database_path('seeds/csv/sub-categories.csv');
        $excel = App::make('excel');
        SubCategories::truncate();
        $data = $excel->load($csv, function($reader) {
            $results = $reader->all();
            foreach($results as $row) {
                SubCategories::updateOrCreate([
                    'category_id' => $row->category,
                    'sub_category_name' => $row->subcategory
                ], [
                    'sub_category_desc' => $row->description
                ]);
            }
        });
    }
}
