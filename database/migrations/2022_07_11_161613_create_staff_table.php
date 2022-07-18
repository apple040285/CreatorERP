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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id')->comment('關聯所屬部門');
            $table->unsignedBigInteger('job_id')->comment('關聯所屬職位');
            $table->string('code', 50)->unique()->comment('員工編號');
            $table->string('name', 50)->comment('員工姓名');
            $table->string('email', 50)->nullable()->comment('信箱');
            $table->string('alias', 50)->nullable()->comment('員工別名');
            $table->string('telephone', 30)->nullable()->comment('電話號碼');
            $table->string('cellphone', 30)->nullable()->comment('手機號碼');
            $table->string('residence_address', 50)->nullable()->comment('戶籍地址');
            $table->string('mailing_address', 50)->nullable()->comment('通訊地址');
            $table->string('arrival_date', 50)->nullable()->comment('到職日');
            $table->string('resignation_date', 50)->nullable()->comment('離職日');
            $table->string('remark', 50)->nullable()->comment('備註');
            $table->json('data')->nullable();
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
        Schema::dropIfExists('staff');
    }
};
