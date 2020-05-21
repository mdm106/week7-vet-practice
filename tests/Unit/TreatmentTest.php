<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase; //to use test database
use Illuminate\Support\Collection;

use App\Treatment;

class TreatmentTest extends TestCase
{   
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFromString1()
    {   
        // call the Treatment:fromString static method
        $result = Treatment::fromString("Test");

        // check we get back a Treatment
        // using assertInstanceOf to check the class 
        $this->assertInstanceOf(Treatment::class, $result);

        //check the treatment has the right name
        $this->assertSame("Test", $result->name);

    }

    public function testFromString2()
    {   
        // call the Treatment:fromString static method
        $result = Treatment::fromString("Hammock");

        // check we get back a Treatment
        // using assertInstanceOf to check the class 
        $this->assertInstanceOf(Treatment::class, $result);

        //check the treatment has the right name
        $this->assertSame("Hammock", $result->name);

    }

    public function testFromStringTrimmed()
    {   
        // call the Treatment:fromString static method
        $result = Treatment::fromString(" Hammock ");

        // check we get back a Treatment
        // using assertInstanceOf to check the class 
        $this->assertInstanceOf(Treatment::class, $result);

        //check the treatment has the right name
        $this->assertSame("Hammock", $result->name);

    }



    public function testInDatabase1()
    {   
       $result = Treatment::fromString("Test");
       // get the first treatment from the database
       $treatmentFromDB = Treatment::all()->first(); // check we get a treatment
       $this->assertInstanceOf(Treatment::class, $treatmentFromDB); // check it's got the right name
       $this->assertSame("Test", $treatmentFromDB->name);

    }

    public function testNoDuplicate()
    {   
       $result = Treatment::fromString("Test");
       $result2 = Treatment::fromString("Test  ");
       $allTreatments = Treatment::where("name", "Test"); 
       $this->assertSame(1, $allTreatments->count());

    }

    public function testFromStrings()
    {
    // call the fromStrings method
    $result = Treatment::fromStrings(["Test ", "Hammock"]);
    // check it's a Collection
    $this->assertInstanceOf(Collection::class, $result); // check the first item is "Test"
    $this->assertSame("Test", $result[0]->name);
    // check the second item is "Hammock"
    $this->assertSame("Hammock", $result[1]->name); 
    }

    public function testFinal()
    {
    // call the fromStrings method
    $treatments = Treatment::fromStrings(["Fel-O-Vax Lv-K", "Pecti-Cap", "Zymox Ear Cleanser"]);
    // check it's a Collection
    $this->assertInstanceOf(Collection::class, $treatments); 
    $this->assertSame("Fel-O-Vax Lv-K", $treatments[0]->name);
    $this->assertSame("Pecti-Cap", $treatments[1]->name); 
    $this->assertSame("Zymox Ear Cleanser", $treatments[2]->name); 
    }


}
