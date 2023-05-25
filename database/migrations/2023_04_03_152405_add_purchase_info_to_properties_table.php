<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPurchaseInfoToPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->decimal('rent_cost', 10, 2)->nullable(); //10 digits before decimal point and 2 digits after decimal point
            $table->date('construction_date')->nullable();
            $table->text('maintenance_history')->nullable();
            // $table->integer('quantity')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn([ 'rent_cost', 'construction_date', 'maintenance_history']);
        });
    }

}
