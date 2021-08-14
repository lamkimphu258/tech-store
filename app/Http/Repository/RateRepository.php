<?php

namespace App\Http\Repository;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RateRepository
{
    public const TABLE = 'rates';

    public function save(float $rate)
    {
        DB::table('rates')->insert([
            'id' => Str::uuid(),
            'value' => $rate,
        ]);
    }
}
