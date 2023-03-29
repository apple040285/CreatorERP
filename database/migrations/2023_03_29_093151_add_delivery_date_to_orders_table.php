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
        if (!Schema::hasColumn('procurement_orders', 'delivery_date')) {
            Schema::table('procurement_orders', function (Blueprint $table) {
                $table->timestamp('delivery_date')->useCurrent()->comment('預交日期')->after('billing_type');
            });
        }

        if (!Schema::hasColumn('purchase_orders', 'delivery_date')) {
            Schema::table('purchase_orders', function (Blueprint $table) {
                $table->timestamp('delivery_date')->useCurrent()->comment('預交日期')->after('billing_type');
            });
        }

        if (!Schema::hasColumn('quotation_orders', 'delivery_date')) {
            Schema::table('quotation_orders', function (Blueprint $table) {
                $table->timestamp('delivery_date')->useCurrent()->comment('預交日期')->after('billing_type');
            });
        }

        if (!Schema::hasColumn('subscriber_orders', 'delivery_date')) {
            Schema::table('subscriber_orders', function (Blueprint $table) {
                $table->timestamp('delivery_date')->useCurrent()->comment('預交日期')->after('billing_type');
            });
        }

        if (!Schema::hasColumn('sales_orders', 'delivery_date')) {
            Schema::table('sales_orders', function (Blueprint $table) {
                $table->timestamp('delivery_date')->useCurrent()->comment('預交日期')->after('billing_type');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('procurement_orders', 'delivery_date')) {
            Schema::table('procurement_orders', function (Blueprint $table) {
                $table->dropColumn('delivery_date');
            });
        }

        if (Schema::hasColumn('purchase_orders', 'delivery_date')) {
            Schema::table('purchase_orders', function (Blueprint $table) {
                $table->dropColumn('delivery_date');
            });
        }

        if (Schema::hasColumn('quotation_orders', 'delivery_date')) {
            Schema::table('quotation_orders', function (Blueprint $table) {
                $table->dropColumn('delivery_date');
            });
        }

        if (Schema::hasColumn('subscriber_orders', 'delivery_date')) {
            Schema::table('subscriber_orders', function (Blueprint $table) {
                $table->dropColumn('delivery_date');
            });
        }

        if (Schema::hasColumn('sales_orders', 'delivery_date')) {
            Schema::table('sales_orders', function (Blueprint $table) {
                $table->dropColumn('delivery_date');
            });
        }
    }
};
