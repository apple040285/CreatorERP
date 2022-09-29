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
        Schema::create('sales_order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sales_order_id')->comment('關聯所屬進貨訂單');
            $table->unsignedBigInteger('product_id')->comment('關聯所屬商品');
            $table->unsignedBigInteger('storehouse_id')->comment('關聯所屬倉庫');
            $table->integer('quantity')->comment('數量');
            $table->float('price')->comment('單價');
            $table->float('discount_amount')->nullable()->comment('折扣');
            $table->float('tax_excluding_amount')->default(0)->comment('未稅金額');
            $table->float('tax_amount')->default(0)->comment('稅金');
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
        Schema::dropIfExists('sales_order_items');
    }
};
