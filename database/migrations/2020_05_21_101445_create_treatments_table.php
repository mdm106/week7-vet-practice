<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create the treatments table
        // it's a termlist so call the string column name
        // don't need timestamps - not very useful here 
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string("name", 30);
        });

        // create the pivot table using the Eloquent naming convention//name must be in alphabetical order
        Schema::create("animal_treatment", function (Blueprint $table) { // still have an id column
        $table->id();
        // create the animal id column and foreign key
        $table->foreignId("animal_id")->unsigned(); 
        $table->foreign("animal_id")->references("id")
        ->on("animals")->onDelete("cascade");
        // create the treatment id column and foreign key
        $table->foreignId("treatment_id")->unsigned();
        $table->foreign("treatment_id")->references("id")
        ->on("treatments")->onDelete("cascade");
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   

        // remove the pivot table first
        // otherwise all the treatments foreign key contraints would fail 
        Schema::dropIfExists("animal_treatment");
        // then drop the treatments table
        Schema::dropIfExists('treatments');
    }
}
