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
        Schema::create('customer_manufacturers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_manufacturer_category_id')->comment('關聯所屬分類');
            $table->unsignedBigInteger('currency_id')->nullable()->comment('關聯所屬幣別');
            $table->string('code', 50)->unique()->comment('編號');
            $table->string('type', 50)->comment('類型歸屬');
            $table->string('full_name', 50)->comment('全稱');
            $table->string('short_name', 50)->nullable()->comment('簡稱');
            $table->string('alias', 50)->nullable()->comment('別名');
            $table->string('email', 50)->nullable()->comment('信箱');
            $table->string('fax', 50)->nullable()->comment('傳真');
            $table->string('unicode', 50)->nullable()->comment('統一編號');
            $table->string('payment_type', 50)->nullable()->comment('類型歸屬');
            $table->string('invoice_type', 50)->nullable()->comment('發票類型');
            $table->string('invoice_name', 50)->nullable()->comment('發票名稱');
            $table->string('invoice_address', 50)->nullable()->comment('發票地址');
            $table->string('company_address', 50)->nullable()->comment('公司地址');
            $table->string('zip_code', 50)->nullable()->comment('郵政編號');
            $table->string('status')->default('active')->comment('備註');
            $table->timestamp('disable_at')->nullable()->comment('停用時間');
            $table->string('remark')->nullable()->comment('備註');
            $table->longText('data')->nullable();
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
        Schema::dropIfExists('customer_manufacturers');
    }
};
