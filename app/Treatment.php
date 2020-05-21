<?php

namespace App;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    // don't need timestamps
    // no idea why this one is public
    public $timestamps = false;

    protected $fillable = ["name"];

    public function animals()
    {
        return $this->belongsToMany(Animal::class);
    }

    static public function fromString(string $string) : Treatment 
    {
        $treatment = Treatment::where("name", trim($string))->first();
        return $treatment ? $treatment : Treatment::create(["name" => trim($string)]);
    }

    static public function fromStrings(array $strings) : Collection
    {
        return collect($strings)->map([Treatment::class, "fromString"]);
    }


}
