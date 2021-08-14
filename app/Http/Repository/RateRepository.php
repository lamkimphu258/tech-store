<?php

namespace App\Http\Repository;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RateRepository
{
    public const TABLE = 'rates';

    /**
     * @param float $rate
     */
    public function save(float $rate)
    {
        DB::table('rates')->insert([
            'id' => Str::uuid(),
            'value' => $rate,
        ]);
    }

    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return DB::table('rates')->get();
    }
}
