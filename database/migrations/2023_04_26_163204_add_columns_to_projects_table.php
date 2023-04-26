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
        if (!Schema::hasColumn('projects', 'customer_order_number')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->string('customer_order_number')->nullable()->comment('客戶訂單號');
            });
        }

        if (!Schema::hasColumn('projects', 'customer_address_name')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->string('customer_address_name')->nullable()->comment('客戶地址');
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
        if (Schema::hasColumn('projects', 'customer_order_number')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropColumn('customer_order_number');
            });
        }

        if (Schema::hasColumn('projects', 'customer_address_name')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropColumn('customer_address_name');
            });
        }
    }
};
