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
        Schema::create('requisitions_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamp('quotation_date')->useCurrent()->comment('訂購日期');
            $table->string('quotation_order_no')->comment('報價單號');
            $table->unsignedBigInteger('customer_id')->comment('客戶名稱');
            $table->unsignedBigInteger('businessPeople_id')->comment('業務人員');
            $table->unsignedBigInteger('transferNo_id')->comment('輸入單號');
            $table->unsignedBigInteger('quotationDepartment_id')->comment('部門');
            $table->unsignedBigInteger('currency_id')->comment('幣別');
            $table->timestamp('effective_date')->useCurrent()->comment('有效日期');
            $table->timestamp('expiration_date')->useCurrent()->comment('失效日期');
            $table->string('tax_type')->comment('扣稅類別');
            $table->string('customerReservation')->comment('客戶訂單');
            $table->string('project_naem')->comment('專案名稱');
            $table->unsignedBigInteger('project_id')->nullable()->comment('專案編號');
            $table->float('untaxedlocalcurrency')->nullable()->comment('未稅本幣');
            $table->float('localcurrencytax')->comment('本幣歲額');
            $table->float('totallocalcurrency')->comment('本幣金額');
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
        Schema::dropIfExists('requisitions_orders');
    }
};
