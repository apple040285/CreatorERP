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
        Schema::create('p_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id')->nullable()->comment('關聯所屬人員');
            $table->unsignedBigInteger('storehouse_id')->nullable()->comment('關聯所屬倉庫');
            $table->string('email')->unique()->comment('帳號');
            $table->string('password')->comment('密碼');
            $table->unsignedBigInteger('created_by')->nullable()->comment('創建人');
            $table->unsignedBigInteger('updated_by')->nullable()->comment('更新人');
            $table->timestamps();
            $table->json('data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_members');
    }
};
