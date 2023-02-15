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
        Schema::create('purchase_order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_order_id')->comment('關聯所屬進貨訂單');
            $table->unsignedBigInteger('product_id')->comment('關聯所屬商品');
            $table->unsignedBigInteger('storehouse_id')->comment('關聯所屬倉庫');
            $table->integer('quantity')->comment('數量');
            $table->float('price')->comment('單價');
            $table->float('amount')->comment('金額');
            $table->timestamp('delivery_date')->useCurrent()->comment('預交日期');
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
        Schema::dropIfExists('purchase_order_items');
    }
};
