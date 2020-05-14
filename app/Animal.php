<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
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
}
