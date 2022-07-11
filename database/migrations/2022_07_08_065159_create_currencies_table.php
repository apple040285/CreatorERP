<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('source_code', 50)->comment('來源貨幣代號');
            $table->string('target_code', 50)->comment('目標貨幣代號');
            $table->string('name', 50)->comment('幣別名稱');
            $table->float('rate')->comment('匯率');
            $table->float('buying_rate')->default(0)->comment('買進匯率');
            $table->float('selling_rate')->default(0)->comment('賣出匯率');
            $table->integer('unit_price_of_digits')->default(0)->comment('單位小位數');
            $table->integer('amount_of_digits')->default(0)->comment('金額小位數');
            $table->string('remark')->nullable()->comment('備註');
            $table->unsignedBigInteger('created_by')->nullable()->comment('創建人');
            $table->unsignedBigInteger('updated_by')->nullable()->comment('更新人');
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
        Schema::dropIfExists('currencies');
    }
};
