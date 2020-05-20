<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Animal;

class AnimalTest extends TestCase
{
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
}
