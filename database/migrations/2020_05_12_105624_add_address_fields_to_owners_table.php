<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressFieldsToOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('owners', function (Blueprint $table) {
            // add new address field columns
            $table->string('address_1', 255);
            $table->string('address_2', 255)->nullable();
            $table->string('town', 50);
            $table->string('postcode', 8);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('owners', function (Blueprint $table) {
            //dropping address columns
            $table->dropColumn(['address_1', 'address_2', 'town', 'postcode']);
        });
    }
}
