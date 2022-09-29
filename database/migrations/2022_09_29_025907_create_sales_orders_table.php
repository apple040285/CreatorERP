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
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamp('sales_date')->useCurrent()->comment('銷貨日期');
            $table->string('sales_order_no')->comment('銷貨單號');
            $table->unsignedBigInteger('customer_manufacturer_id')->nullable()->comment('廠商名稱');
            $table->unsignedBigInteger('staff_id')->nullable()->comment('進貨人員');
            $table->unsignedBigInteger('department_id')->nullable()->comment('採購部門');
            $table->unsignedBigInteger('currency_id')->nullable()->comment('幣別');
            $table->timestamp('delivery_date')->useCurrent()->comment('預交日期');
            $table->string('tax_type')->comment('扣稅類別');
            $table->string('account_setting_method')->comment('立帳方式');
            $table->unsignedBigInteger('project_id')->nullable()->comment('專案編號');
            $table->float('deposit_amount')->nullable()->comment('訂金');
            $table->float('discount_amount')->nullable()->comment('折扣');
            $table->float('tax_excluding_amount')->default(0)->comment('未稅金額');
            $table->float('tax_amount')->default(0)->comment('稅金');
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
        Schema::dropIfExists('sales_orders');
    }
};
