<?php

use Illuminate\Database\Seeder;

use App\Models\Products;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = database_path('seeds/csv/products.csv');
        $excel = App::make('excel');
        Products::truncate();
        $data = $excel->load($csv, function($reader) {
            $results = $reader->all();
            foreach($results as $row) {
                Products::updateOrCreate([
                    'category_id' => $row->categories,
                    'sub_category_id' => $row->subcategories,
                    'product_name' => $row->productname
                ], [
                    'product_desc' => $row->productdescription
                ]);
            }
        });
    }
}
