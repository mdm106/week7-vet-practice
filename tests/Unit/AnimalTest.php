<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Animal;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnimalTest extends TestCase
{
	use RefreshDatabase;
	private $animal;

    public function testDangerous()
    {

        // Given I have 5 animals with biteyness 1 through 5
		$animals = factory(Animal::class, 5)
		->make()
		->each(function ($animal, $key) {
			$animal->biteyness = $key + 1; // Set bitness to 1 to 5
		});

		//Then
		// Bitneyness under 4 should be false
		for ($i=0; $i < 2; $i++) {
			$this->assertFalse($animals[$i]->dangerous(), "Animal id = {$i}");
		}
		// Bitneyness over 4 should be true
		for ($i=2; $i < 5; $i++) {
			$this->assertTrue($animals[$i]->dangerous(), "Animal id = {$i}");
		}
	}
	
	public function testAddTreatments()
	{
		Animal::create([
			"name"=> "Grumpy",
			"type"=>"Rabbit",
			"dob"=>"2018-02-13",
			"weight_kg"=>"2.2",
			"height_cm"=>"15.2",
			"owner_id"=>109,
			"biteyness"=>"5",
		]);
		$animal = Animal::all()->first();
		//add some treatments
		$animal->addTreatments(["jab", "groom", "neuter"]);

		//check the animal from the DB has the treatments
		$fromDB = Animal::all()->first();
		
		$this->assertSame(3, $fromDB->treatments->count());
		
	}
}
