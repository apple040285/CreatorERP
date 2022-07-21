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
        Schema::create('storehouses', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique()->comment('倉庫代號');
            $table->string('name', 50)->comment('倉庫名稱');
            $table->string('contact_person', 50)->nullable()->comment('聯絡人');
            $table->string('phone', 50)->nullable()->comment('電話號碼');
            $table->string('fax', 50)->nullable()->comment('倉庫傳真');
            $table->string('address', 50)->nullable()->comment('倉庫地址');
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
        Schema::dropIfExists('storehouses');
    }
};
