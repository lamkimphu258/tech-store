<?php

use App\Http\Enums\SalesPromotions\SalesPromotionColumn;
use App\Models\SalesPromotion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(SalesPromotion::TABLE_NAME, function (Blueprint $table) {
            $table->uuid(SalesPromotionColumn::ID)->unique();
            $table->string(SalesPromotionColumn::SALES_PROMOTION_LINK);
            $table->string(SalesPromotionColumn::IMAGE);
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
        Schema::dropIfExists(SalesPromotion::TABLE_NAME);
    }
}
