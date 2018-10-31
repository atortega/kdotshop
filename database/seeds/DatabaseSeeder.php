<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['places'];
    public function run()
    {
        Model::unguard();
        foreach($this->toTruncate as $places) {
            DB::table($places)->truncate();
        }
        $this->call(PlacesTableSeeder::class);
        Model::reguard();
    }
}