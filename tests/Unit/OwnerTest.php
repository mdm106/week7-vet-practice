<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Owner;

class OwnerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFillable()
    {
        $owner = new Owner([
            "first_name" => "Louis",
            "last_name" => "Theroux",
            "telephone" => "01178546953",
            "address_1" => "1 Documentary Lane",
            "address_2" => "TV ville",
            "town" => "Programme Town",
            "postcode" => "TV1 2BC",
            "bad" => "bad one",
        ]);

        $this->assertSame("Louis", $owner->first_name);
        $this->assertSame("Theroux", $owner->last_name);
        $this->assertSame("01178546953", $owner->telephone);
        $this->assertSame("1 Documentary Lane", $owner->address_1);
        $this->assertSame("TV ville", $owner->address_2);
        $this->assertSame("Programme Town", $owner->town);
        $this->assertSame("TV1 2BC", $owner->postcode);
        $this->assertSame(null, $owner->bad);
    }
}
