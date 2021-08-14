<?php

namespace App\Http\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class SalesPromotionRepository
{
    public function getLatest()
    {
        return DB::table('sales_promotions')
            ->orderBy('created_at')
            ->first();
    }
}
