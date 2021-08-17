<?php

namespace App\Http\Repository;

use App\Http\Enums\Categories\CategoryColumn;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryRepository
{
    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return DB::table(Category::TABLE_NAME)->get();
    }

    public function save($name)
    {
        DB::table(Category::TABLE_NAME)->insert([
            CategoryColumn::ID => Str::uuid(),
            CategoryColumn::NAME => $name,
            CategoryColumn::CREATED_AT => Carbon::now(),
        ]);
    }
}
