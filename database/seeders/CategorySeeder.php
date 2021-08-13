<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public const CATEGORIES = ['Smartphones', 'Tablets', 'Laptops', 'PCs', 'Accessories'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::CATEGORIES as $category) {
            DB::table('categories')->insert([
                'id' => Str::uuid(),
                'name' => $category,
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
