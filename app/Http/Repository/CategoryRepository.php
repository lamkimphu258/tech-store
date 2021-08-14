<?php

namespace App\Http\Repository;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

    public function save($name) {
        DB::table(self::TABLE)->insert([
            'id' => Str::uuid(),
            'name' => $name,
            'created_at' => Carbon::now(),
        ]);
    }
}
