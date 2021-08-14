<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

class SalesPromotionRepository
{
    public function getLatest() {
        return DB::table('sales_promotions')
            ->orderBy('created_at')
            ->first();
    }
}
