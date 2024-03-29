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
        Schema::create('customer_manufacturer_categories', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique()->comment('分類代號');
            $table->string('type', 50)->comment('類型歸屬 客戶 | 廠商');
            $table->string('name', 50)->comment('分類名稱');
            $table->string('alias', 50)->nullable()->comment('別名');
            $table->string('status')->default('active')->comment('備註');
            $table->timestamp('disable_at')->nullable()->comment('停用時間');
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
        Schema::dropIfExists('customer_manufacturer_categories');
    }
};
