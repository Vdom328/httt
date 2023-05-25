<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToPropertiesTable extends Migration
{
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->date('rented_date')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('payment_status')->nullable();
            $table->date('contract_expiry_date')->nullable();
        });
    }

    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('rented_date');
            $table->dropColumn('payment_date');
            $table->dropColumn('payment_status');
            $table->dropColumn('contract_expiry_date');
        });
    }
}
