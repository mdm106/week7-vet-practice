<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;
use App\Animal;
use App\Http\Requests\OwnerRequest;
use App\Http\Requests\AnimalRequest;
use Auth;

class Animals extends Controller
{
    public function index()
    {
        $animals = Animal::paginate(5);
        return view("animals", ["animals" => $animals]);
    }

    public function show(Animal $animal)
    {
        return view("single_animal", ["animal" => $animal]);
    }
}
