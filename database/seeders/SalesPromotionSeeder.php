<?php

namespace Database\Seeders;

use App\Models\SalesPromotion;
use Database\Factories\SalesPromotionFactory;
use Illuminate\Database\Seeder;

class SalesPromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SalesPromotion::factory()->count(5)->create();
    }
}
