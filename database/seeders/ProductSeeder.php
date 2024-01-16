<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $faker = Faker::create();
//
//        foreach (range(1, 100) as $index) {
//            Product::create([
//                'name' => $faker->name,
//                'category_id' => $faker->numberBetween(1,10),
//                'sub_category_id' => $faker->numberBetween(1,10),
//                'brand_id' => $faker->numberBetween(1,10),
//                'unit_id' => $faker->numberBetween(1,10),
//                'sku' => $faker->paragraph,
//                'code' => $faker->numberBetween(1,1000),
//                'type_id' => $faker->boolean,
//                'short_description' => $faker->paragraph,
//                'long_description' => $faker->paragraph,
//                'image' => $faker->image,
//                'regular_price' => $faker->numberBetween(0,1000),
//                'selling_price' => $faker->numberBetween(0,1000),
//                'stock_amount' => $faker->numberBetween(0,1000),
//                'refund' => $faker->boolean,
//                'tags' => $faker->name,
//                'shipping_cost' => $faker->numberBetween(0,100),
//                'cash_on' => $faker->boolean,
//                'flash_deal' => $faker->boolean,
//                'status' => $faker->boolean,
//            ]);
//            Category::create([
//                'name' => $faker->name,
//                'status' => $faker->boolean,
//            ]);
//            SubCategory::create([
//                'name' => $faker->name,
//                'category_id' => $faker->numberBetween(0,6),
//                'status' => $faker->boolean,
//            ]);
//            Brand::create([
//                'name' => $faker->name,
//                'status' => $faker->boolean,
//            ]);
//            Unit::create([
//                'name' => $faker->name,
//                'code' => $faker->text(4),
//                'status' => $faker->boolean,
//            ]);
//            Color::create([
//                'name' => $faker->colorName,
//                'code' => $faker->hexColor(),
//                'status' => $faker->boolean,
//            ]);
//
//            Size::create([
//                'name' => $faker->name,
//                'code' => $faker->text(4),
//                'status' => $faker->boolean,
//            ]);
//            ProductColor::create([
//                'product_id' => $faker->numberBetween(1,100),
//                'color_id' => $faker->numberBetween(1,50),
//            ]);
//            ProductSize::create([
//                'product_id' => $faker->numberBetween(1,100),
//                'size_id' => $faker->numberBetween(1,50),
//            ]);
//
//
//        }
    }
}
