<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{

    protected $fillable = ["name", "type", "dob", "weight_kg", "height_cm", "biteyness", "owner_id", "treatments"];
    //setup the relationship with owners
    //use single because only has one owner
    public function owner()
    {
        //an animal belongs to a owner
        return $this->belongsTo(Owner::class);
    }

    public function dangerous()
    {
        return $this->biteyness >= 3;
    }

    public function treatments()
    {
        return $this->belongsToMany(Treatment::class);
    }

    public function addTreatments(array $strings) : Animal
    {
        $treatments = Treatment::fromStrings($strings);

        //we're on an animal instance, so use $this
        //pass in collection of IDs
        $this->treatments()->sync($treatments->pluck("id"));

        //return $this in case we want to chain
        return $this;
    }
}
