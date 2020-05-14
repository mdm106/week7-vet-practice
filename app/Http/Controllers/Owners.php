<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;
use App\Http\Requests\OwnerRequest;

class Owners extends Controller
{
    public function index()
    {
        $owners = Owner::paginate(5);
        return view("owners", ["owners" => $owners]);
    }

    public function show(Owner $owner)
    {
        return view("single_owner", ["owner" => $owner]);
    }

    public function create()
    {
        return view("form");
    }

    //accepts the request object to give access to the submitted data
    public function createOwner(OwnerRequest $request)
    {
        //get all of the submitted data
        $data = $request->all();

        //create a new owner in the Owner database, passing in the submitted data
        $owner = Owner::create($data);

        //redirect the browser to the new owner
        return redirect("/owners/{$owner->id}");
    }

}
