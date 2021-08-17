<?php

use App\Http\Enums\Rates\RateColumn;
use App\Models\Rate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Rate::TABLE_NAME, function (Blueprint $table) {
            $table->uuid(RateColumn::ID)->unique();
            $table->integer(RateColumn::VALUE);
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
        Schema::dropIfExists(Rate::TABLE_NAME);
    }
}
