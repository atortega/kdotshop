<?php

use Illuminate\Database\Seeder;

use App\Models\Sku;

class SkuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = database_path('seeds/csv/sku.csv');
        $excel = App::make('excel');
        Sku::truncate();
        $data = $excel->load($csv, function($reader) {
            $results = $reader->all();
            foreach($results as $row) {
                Sku::updateOrCreate([
                    'id' => $row->id
                ], [
                    'sku' => $row->sku,
                    'product_id' => $row->product_id,
                    'color_id'  => $row->color_id,
                    'size_id'   => $row->size_id,
                    'number_of_items' => $row->qty,
                    'unit_price'    => $row->price
                ]);
            }
        });
    }
}
