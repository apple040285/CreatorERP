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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->comment('銀行代號');
            $table->string('swift_code', 50)->nullable()->comment('銀行行稱');
            $table->string('name', 50)->comment('銀行名稱');
            $table->string('alias', 50)->comment('銀行別名 (可當英文名稱用)');
            $table->string('phone', 50)->nullable()->comment('電話');
            $table->float('rate', 50)->nullable()->comment('銀行名稱');
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
        Schema::dropIfExists('banks');
    }
};
