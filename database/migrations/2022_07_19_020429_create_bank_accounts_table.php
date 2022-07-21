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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bank_id')->comment('關聯所屬銀行');
            $table->unsignedBigInteger('currency_id')->comment('關聯所屬幣別');
            $table->string('type', 50)->comment('帳戶類型');
            $table->string('code', 50)->unique()->comment('帳戶代號');
            $table->string('name', 50)->comment('帳戶名稱');
            $table->float('amount')->default(0)->comment('帳戶金額');
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
        Schema::dropIfExists('bank_accounts');
    }
};
