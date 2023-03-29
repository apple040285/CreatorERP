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
        Schema::create('subscriber_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamp('subscriber_date')->useCurrent()->comment('訂購日期');
            $table->string('subscriber_order_no')->comment('訂購單號');
            $table->string('transfer_type')->nullable()->comment('轉入單號類型');
            $table->string('transfer_order_no')->nullable()->comment('轉入單號');
            $table->unsignedBigInteger('customer_manufacturer_id')->comment('客戶名稱');
            $table->unsignedBigInteger('staff_id')->comment('訂購人員');
            $table->unsignedBigInteger('department_id')->comment('訂購部門');
            $table->unsignedBigInteger('currency_id')->comment('幣別');
            $table->timestamp('delivery_date')->useCurrent()->comment('預交日期');
            $table->string('billing_type')->comment('立帳方式');
            $table->timestamp('delivery_date')->useCurrent()->comment('預交日期');
            $table->string('tax_type')->comment('扣稅類別');
            $table->unsignedBigInteger('project_id')->nullable()->comment('專案編號');
            $table->float('tax_excluding_amount')->comment('未稅金額');
            $table->float('tax_amount')->comment('稅金');
            $table->float('total_amount')->comment('合計');
            $table->string('status')->comment('單據狀態');
            $table->string('status_approval')->comment('審核狀態');
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
        Schema::dropIfExists('subscriber_orders');
    }
};
