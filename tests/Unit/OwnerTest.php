<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Owner;
use App\Animal;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OwnerTest extends TestCase
{
    //****need address fields and biteyness to be made nullable for duration of the tests****
    use RefreshDatabase;

    public function setUp() : void
    {
        // make sure we call the parent's setUp() method
        parent::setUp();
        // setup the owner
        $this->owner = new Owner([
            "first_name" => "Louis",
            "last_name" => "Theroux",
            "telephone" => "01178546953",
            "address_1" => "1 Documentary Lane",
            "address_2" => "TV ville",
            "town" => "Programme Town",
            "postcode" => "TV1 2BC",
            "bad" => "bad one",
        ]);
    }

    public function testFillable()
    {
        
        $this->assertSame("Louis", $this->owner->first_name);
        $this->assertSame("Theroux", $this->owner->last_name);
        $this->assertSame("01178546953", $this->owner->telephone);
        $this->assertSame("1 Documentary Lane", $this->owner->address_1);
        $this->assertSame("TV ville", $this->owner->address_2);
        $this->assertSame("Programme Town", $this->owner->town);
        $this->assertSame("TV1 2BC", $this->owner->postcode);
        $this->assertNull($this->owner->bad);
    }

    public function testTelephone()
    {   
        $nonValidNumbers = ["011285975864787979", "01128597"];
        $validNumbers = ["0112 851-89745", "0112 85977856", "01178546953"];
        
        //non valid numbers
        foreach($nonValidNumbers as $number) {
            $this->owner->telephone = $number;
            $this->assertFalse($this->owner->validPhoneNumber());
        }

        //valid Numbers
        foreach($validNumbers as $number) {
            $this->owner->telephone = $number;
            $this->assertTrue($this->owner->validPhoneNumber());
        }

    }

    public function testOwnerDatabase()
    {   
        //add a owner to the database using the set up owner above
        Owner::create([
            "first_name" => "Louis",
            "last_name" => "Theroux",
            "telephone" => "01178546953",
            "address_1" => "1 Documentary Lane",
            "address_2" => "TV ville",
            "town" => "Programme Town",
            "postcode" => "TV1 2BC",
            "bad" => "bad one",
        ]);
        //get the first owner back from the database
        $ownerFromDB = Owner::all()->first();

        //check the first and last name match
        $this->assertSame("Louis", $ownerFromDB->first_name);
        $this->assertSame("Theroux", $ownerFromDB->last_name);
    }

    public function testNumberOfPets()
    {   
        //add a owner to the database using the set up owner above
        Owner::create([
            "first_name" => "Louis",
            "last_name" => "Theroux",
            "telephone" => "01178546953",
            "address_1" => "1 Documentary Lane",
            "address_2" => "TV ville",
            "town" => "Programme Town",
            "postcode" => "TV1 2BC",
            "bad" => "bad one",
        ]);

        //get the first owner back from the database
        $ownerFromDB = Owner::all()->first();

        //check the number of pets match - none added yet
        $this->assertSame(0, $ownerFromDB->numberOfPets()); 
    
        Animal::create([
                "name"=> "Fluffy",
                "type"=> "Shark",
                "dob"=>"2010-12-31",
                "weight_kg"=> "250.2",
                "height_cm"=>"99.9",
                "owner_id"=> $ownerFromDB->id,
                "biteyness"=>"5"
        ]);

        $ownerFromDB = Owner::all()->first();
        //check the number of pets match - one now added
        $this->assertSame(1, $ownerFromDB->numberOfPets()); 

        Animal::create([
            "name"=> "Rover",
            "type"=> "Dog",
            "dob"=>"2010-12-31",
            "weight_kg"=> "20.2",
            "height_cm"=>"15.5",
            "owner_id"=> $ownerFromDB->id,
            "biteyness"=>"2"
        ]);

        $ownerFromDB = Owner::all()->first();
        //check the number of pets match - one now added
        $this->assertSame(2, $ownerFromDB->numberOfPets());

    }

}
