<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Animal;

class AnimalTest extends TestCase
{
    public function setUp() : void
    {
        // make sure we call the parent's setUp() method
        parent::setUp();
        // setup the owner
        $this->animal = new Animal([
            "name" => "Big Ears",
            "type" => "Hamster",
            "dob"=> "2018-12-31",
            "weight_kg"=> "1.2",
            "height_cm"=> "5.4",
            "owner_id"=> 107,
            "biteyness"=> "1",
        ]);
    }

    public function testBiteyness()
    {

        $this->assertSame(false, $this->animal->dangerous()); //biteyness = 1 as in set up
        $this->animal->biteyness = 2; 
        $this->assertSame(false, $this->animal->dangerous()); 
        $this->animal->biteyness = 3; 
        $this->assertSame(true, $this->animal->dangerous());
        $this->animal->biteyness = 4;
        $this->assertSame(true, $this->animal->dangerous());
        $this->animal->biteyness = 5;
        $this->assertSame(true, $this->animal->dangerous());
    }
}
