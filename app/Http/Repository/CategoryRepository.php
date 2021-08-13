<?php

namespace App\Http\Repository;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    public const TABLE = 'categories';

    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return DB::table(self::TABLE)->get();
    }
}
