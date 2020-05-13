<?php

use Illuminate\Database\Seeder;
use App\Owner;

class OwnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('en_GB');
        foreach (range(1,100) as $index) {
            DB::table('owners')->insert([
                'first_name'=>$faker->firstName,
                'last_name'=>$faker->lastName,
                'telephone'=>$faker->mobileNumber,
                'address_1'=>$faker->streetAddress,
                'address_2'=>$faker->county,
                'town'=>$faker->city,
                'postcode'=>$faker->postcode,
            ]);
        }
    }
}
