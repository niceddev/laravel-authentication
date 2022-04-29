<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CityProductSeeder extends Seeder
{
    public function run()
    {
        foreach (City::all() as $city){
            $products = Product::orderBy('id')->take(rand(1, 5))->pluck('id');
            $city->products()->attach($products);
        }
    }
}
