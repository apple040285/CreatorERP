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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique()->comment('專案代號');
            $table->string('name', 50)->comment('專案名稱');
            $table->string('address')->nullable()->comment('地址');
            $table->timestamp('invalid_at')->nullable()->comment('無效時間');
            $table->unsignedBigInteger('customer_manufacturer_id')->nullable()->comment('客戶廠商');
            $table->unsignedBigInteger('staff_id')->nullable()->comment('員工職員');
            $table->decimal('scheduled_amount')->default(0)->comment('預定金額');
            $table->decimal('estimated_profit')->default(0)->comment('預估獲利');
            $table->decimal('actual_total')->default(0)->comment('實際總額');
            $table->string('remark')->nullable()->comment('備註');
            $table->unsignedBigInteger('created_by')->nullable()->comment('創建人');
            $table->unsignedBigInteger('updated_by')->nullable()->comment('更新人');
            $table->timestamps();
            $table->json('data')->nullable();
            $table->string('customer_order_number')->nullable()->comment('客戶訂單號');
            $table->string('customer_address_name')->nullable()->comment('客戶地址');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
