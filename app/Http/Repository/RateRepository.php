<?php

namespace App\Http\Repository;


use App\Http\Enums\Rates\RateColumn;
use App\Models\Rate;
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
        DB::table(Rate::TABLE_NAME)->insert([
            RateColumn::ID => Str::uuid(),
            RateColumn::VALUE => $rate,
        ]);
    }

    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return DB::table(Rate::TABLE_NAME)->get();
    }
}
