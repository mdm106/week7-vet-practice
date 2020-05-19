<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Owner;

class OwnerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * 
     */
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
        $this->assertSame(null, $this->owner->bad);
    }

}
