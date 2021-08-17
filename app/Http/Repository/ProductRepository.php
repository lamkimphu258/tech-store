<?php

namespace App\Http\Repository;

use App\Http\Enums\Categories\CategoryColumn;
use App\Http\Enums\Products\ProductColumn;
use App\Http\Enums\Rates\RateColumn;
use App\Http\Enums\SortDirection;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rate;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductRepository
{
    public const DEFAULT_SORT_COLUMN = 'name';

    public const DEFAULT_DIRECTION = 'asc';

    public const NUMBER_OF_PRODUCTS_PER_PAGE = 20;

    public const NUMBER_OF_BEST_SELLER_PRODUCTS = 5;

    public function save(Product $product)
    {
        DB::table(Product::TABLE_NAME)->insert([
            ProductColumn::ID => Str::uuid(),
            ProductColumn::NAME => $product->name,
            ProductColumn::THUMBNAIL => $product->thumbnail,
            ProductColumn::QUANTITY_SOLD => $product->quantity_sold,
            ProductColumn::PRICE => $product->price,
            ProductColumn::DEBUTED_AT => $product->debuted_at,
            ProductColumn::CATEGORY_ID => $product->category_id,
            ProductColumn::RATE_ID => $product->rate_id,
        ]);
    }

    /**
     * @param string $categoryName
     * @return Collection
     */
    public function getBestSeller(string $categoryName): Collection
    {
        return DB::table(Product::TABLE_NAME)
            ->join(
                Category::TABLE_NAME,
                Product::TABLE_NAME.'.'.ProductColumn::CATEGORY_ID,
                '=',
                Category::TABLE_NAME.'.'.CategoryColumn::ID
            )
            ->join(
                Rate::TABLE_NAME,
                Product::TABLE_NAME.'.'.ProductColumn::RATE_ID,
                '=',
                Rate::TABLE_NAME.'.'.RateColumn::ID
            )
            ->where(
                Category::TABLE_NAME.'.'.CategoryColumn::NAME,
                '=',
                $categoryName
            )
            ->orderBy(
                Product::TABLE_NAME.'.'.ProductColumn::QUANTITY_SOLD,
                SortDirection::DESC
            )
            ->select(
                [
                    Product::TABLE_NAME.'.'.ProductColumn::NAME,
                    Product::TABLE_NAME.'.'.ProductColumn::THUMBNAIL,
                    Product::TABLE_NAME.'.'.ProductColumn::PRICE,
                    Rate::TABLE_NAME.'.'.RateColumn::VALUE.' as rates_value',
                ]
            )
            ->limit(self::NUMBER_OF_BEST_SELLER_PRODUCTS)
            ->get();
    }

    /**
     * @param string $category
     * @param string|null $sortColumn
     * @param string|null $direction
     * @return LengthAwarePaginator
     */
    public function getByCategory(
        string $category,
        ?string $sortColumn = self::DEFAULT_SORT_COLUMN,
        ?string $direction = self::DEFAULT_DIRECTION
    ): LengthAwarePaginator {
        return DB::table(Product::TABLE_NAME)
            ->join(
                Category::TABLE_NAME,
                Product::TABLE_NAME.'.'.ProductColumn::CATEGORY_ID,
                '=',
                Category::TABLE_NAME.'.'.CategoryColumn::ID
            )
            ->join(
                Rate::TABLE_NAME,
                Product::TABLE_NAME.'.'.ProductColumn::RATE_ID,
                '=',
                Rate::TABLE_NAME.'.'.RateColumn::ID
            )
            ->where(
                Category::TABLE_NAME.'.'.CategoryColumn::NAME,
                '=',
                $category
            )
            ->select(
                [
                    Product::TABLE_NAME.'.'.ProductColumn::NAME,
                    Product::TABLE_NAME.'.'.ProductColumn::THUMBNAIL,
                    Product::TABLE_NAME.'.'.ProductColumn::PRICE,
                    Rate::TABLE_NAME.'.'.RateColumn::VALUE.' as rates_value',
                ]
            )
            ->orderBy(Product::TABLE_NAME.'.'.$sortColumn, $direction)
            ->paginate(self::NUMBER_OF_PRODUCTS_PER_PAGE);
    }
}
