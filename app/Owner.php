<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
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

    public function formattedPhoneNumber() : Owner
    {
        $this->telephone = substr($this->telephone, 0, 4) . " " . substr($this->telephone, 4);
        $this->save();
        return $this;
    }
}
