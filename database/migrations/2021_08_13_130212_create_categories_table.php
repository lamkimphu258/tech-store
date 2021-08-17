<?php

use App\Http\Enums\Categories\CategoryColumn;
use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Category::TABLE_NAME, function (Blueprint $table) {
            $table->uuid(CategoryColumn::ID)->unique();
            $table->string(CategoryColumn::NAME, 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Category::TABLE_NAME);
    }
}
