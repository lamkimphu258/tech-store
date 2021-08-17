<?php

namespace App\Http\Repository;

use App\Http\Enums\SalesPromotions\SalesPromotionColumn;
use App\Models\SalesPromotion;
use Illuminate\Support\Facades\DB;

class SalesPromotionRepository
{
    public function getLatest()
    {
        return DB::table(SalesPromotion::TABLE_NAME)
            ->orderBy(SalesPromotionColumn::CREATED_AT)
            ->first();
    }
}
