<?php

use App\Http\Enums\Categories\CategoryColumn;
use App\Http\Enums\Products\ProductColumn;
use App\Http\Enums\Rates\RateColumn;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Product::TABLE_NAME, function (Blueprint $table) {
            $table->uuid(ProductColumn::ID)->unique();
            $table->string(ProductColumn::NAME);
            $table->string(ProductColumn::THUMBNAIL);
            $table->integer(ProductColumn::QUANTITY_SOLD);
            $table->float(ProductColumn::PRICE);
            $table->dateTime(ProductColumn::DEBUTED_AT);
            $table->foreignUuid(ProductColumn::RATE_ID);
            $table->foreignUuid(ProductColumn::CATEGORY_ID);
            $table->timestamps();

            $table->foreign(ProductColumn::RATE_ID)->references(RateColumn::ID)->on(
                Rate::TABLE_NAME
            );
            $table->foreign(ProductColumn::CATEGORY_ID)->references(CategoryColumn::ID)->on(
                Category::TABLE_NAME
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Product::TABLE_NAME);
    }
}
