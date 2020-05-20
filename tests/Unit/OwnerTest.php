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
		$owner1 = factory(Owner::class)->make([]);

		$owner2 = factory(Owner::class)->make([]);

		$owner3 = factory(Owner::class)->make([
			'telephone' => '0146464646546545646' /// too long
        ]);
        
        $owner3 = factory(Owner::class)->make([
			'telephone' => '01464' /// too short
		]);

		$this->assertTrue($owner1->validPhoneNumber());
		$this->assertTrue($owner2->validPhoneNumber());
		$this->assertFalse($owner3->validPhoneNumber());
	}

    public function testOwnerDatabase()
    {   
        $owner = factory(Owner::class)->create(["first_name" => "Louis", "last_name" => "Theroux"]);
       
        //get the first owner back from the database
        $ownerFromDB = Owner::all()->first();

        //check the first and last name match
        $this->assertSame("Louis", $ownerFromDB->first_name);
        $this->assertSame("Theroux", $ownerFromDB->last_name);
    }

    public function testNumberOfPets()
    {   
        // use factory to generate owner (no pet)
		$owner1 = factory(\App\Owner::class)->create();

		// use factory to generate owner
		$owner2 = factory(\App\Owner::class)->create();
		// add 1 pet
		$this->addAnimalsToOwner($owner2, 1);

		// use factory to generate owner
		$owner3 = factory(\App\Owner::class)->create();
		// add 3 pets/animals
		$this->addAnimalsToOwner($owner3, 3);

		// test pet count is correct
		$this->assertSame(0, $owner1->numberOfPets());
		$this->assertSame(1, $owner2->numberOfPets());
		$this->assertSame(3, $owner3->numberOfPets());
    }

    /**
	 * helper to attach animals to owner model
	 *
	 * @param Owner $owner
	 * @param int $numOfAnimals
	 * @return void
	 */
	public function addAnimalsToOwner(Owner $owner, $numOfAnimals) : void
	{
		$owner->animals()->createMany(
			factory(\App\Animal::class, $numOfAnimals)->make()->toArray()
		);
		$owner->save();
	}

}
