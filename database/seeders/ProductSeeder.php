<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table("products")->insert(
        [
            [
                "name"=>"Iphone 15",
                "description"=>"Iphone Description..",
                "image" =>"indir.jpg",
                "price"=>"1000",
            ],
              [
                "name"=>"Samsung TV",
                "description"=>"Samsung Description..",
                "image" =>"indir.jpg",
                "price"=>"500",
            ]
        ]
              );
    }
}
