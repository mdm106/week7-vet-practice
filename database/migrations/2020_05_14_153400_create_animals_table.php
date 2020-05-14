<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('type', 50);
            $table->date('dob');
            $table->decimal('weight_kg', 4, 1);
            $table->decimal('height_cm', 4, 1);
            $table->integer('biteyness');
            $table->timestamps();

            //foreign key
            $table->foreignId('owner_id')->unsigned();

            // set up the foreign key constraint
            // this tells MySQL that the owner_id column
            // references the id column on the owners table 
            // we also want MySQL to automatically remove any 
            // animals linked to owners that are deleted
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
