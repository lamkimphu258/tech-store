<?php

namespace App\Http\Repository;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductRepository
{
    public const TABLE = 'products';

    public function save(Product $product)
    {
        DB::table(self::TABLE)->insert([
            'id' => Str::uuid(),
            'name' => $product->name,
            'thumbnail' => $product->thumbnail,
            'quantity_sold' => $product->quantity_sold,
            'price' => $product->price,
            'category_id' => $product->category_id,
            'rate_id' => $product->rate_id,
        ]);
    }

    /**
     * @param string $categoryName
     * @return Collection
     */
    public function getBestSeller(string $categoryName): Collection
    {
        return DB::table(self::TABLE)
            ->join(
                'categories',
                self::TABLE.'.category_id',
                '=',
                'categories.id'
            )
            ->join(
                'rates',
                self::TABLE.'.rate_id',
                '=',
                'rates.id'
            )
            ->where('categories.name', '=', $categoryName)
            ->orderBy(self::TABLE.'.quantity_sold', 'desc')
            ->select([self::TABLE.'.name', self::TABLE.'.thumbnail', self::TABLE.'.price', 'rates.value as rates_value'])
            ->limit(5)
            ->get();
    }
}
