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
                    'product_id' => $row->product_id
                ], [
                    'category_id' => $row->category_id,
                    'sub_category_id' => $row->subcategory_id,
                    'product_image' => $row->image,
                    'originalfilename' => $row->originalfilename,
                    'filesize' => $row->filesize,
                    'product_name' => $row->product_name,
                    'product_desc' => $row->product_desc,
                    //'created_at'    => $row->created_at,
                    //'updated_at'    => $row->updated_at
                ]);
            }
        });
    }
}
