<?php

namespace Tests\Unit\Http\Controllers;

// setup to use database
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
// use classes we'll need
use App\Owner;
use App\User;

class OwnersTest extends TestCase
{
    // the database migrations trait
    // ensures the database is cleared between tests
    use RefreshDatabase;
    private $user;

    //a test for the controllers createOwner() method
    public function testCreateOwner()
    {
        //use the call method to fake a POST request to /owners/create
        //then get the original content
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->call("POST", "/owners/create", [
            "first_name" => "Louis",
            "last_name" => "Theroux",
            "telephone" => "01178546953",
            "address_1" => "1 Documentary Lane",
            "address_2" => "TV ville",
            "town" => "Programme Town",
            "postcode" => "TV1 2BC",
        ]);

        $owner = Owner::all()->first();
        $this->assertSame("Louis", $owner->first_name);
        $this->assertSame("Theroux", $owner->last_name);
    }
}
