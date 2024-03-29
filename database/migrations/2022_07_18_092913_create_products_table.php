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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_category_id')->comment('關聯所屬分類');
            $table->unsignedBigInteger('storehouse_id')->nullable()->comment('關聯所屬預設倉庫');
            $table->string('code', 50)->unique()->comment('產品代號');
            $table->string('name', 50)->comment('產品名稱');
            $table->string('alias', 50)->nullable()->comment('產品別名');
            $table->longText('picture')->nullable()->comment('產品大圖');
            $table->longText('images')->nullable()->comment('產品圖片');
            $table->decimal('price')->default(0)->comment('價格');
            $table->string('invoice_name', 50)->nullable()->comment('發票名稱');
            $table->string('sku', 50)->nullable()->comment('規格');
            $table->string('unit', 50)->nullable()->comment('單位');
            $table->string('barcode', 50)->index()->nullable()->comment('國際條碼');
            $table->string('remark')->nullable()->comment('備註');
            $table->string('status')->default('active')->comment('狀態');
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
        Schema::dropIfExists('products');
    }
};
