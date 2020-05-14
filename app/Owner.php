<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    //setting the fillable fields that can be filled by form submission
    protected $fillable = ["first_name", "last_name", "telephone", "address_1", "address_2", "town", "postcode"];
    
    //method to get fullName
    public function fullName() : string
    {
        return $this->first_name . " " . $this->last_name;
    }

    //method to display fullAddress
    public function fullAddress() : string 
    {
       return  "{$this->address_1}, {$this->address_2}, {$this->town}, {$this->postcode}";
    }

    public function formatTelephone() : string
    {
        return  substr($this->telephone, 0, 4) . " " .substr($this->telephone, 4);
    }

    //setting up relationship with animals
    //use plural because can have multiple pets
    public function animals()
    {
        //use hasMany relationship method
        return $this->hasMany(Animal::class);
    }
}
