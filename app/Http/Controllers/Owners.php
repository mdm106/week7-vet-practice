<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;

class Owners extends Controller
{
    public function index()
    {
        
        return view("owners", ["owners" => Owner::all()]);
    }

}
