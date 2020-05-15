<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;
use App\Animal;
use App\Http\Requests\OwnerRequest;
use App\Http\Requests\AnimalRequest;

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

    public function showEdit(Owner $owner)
     {
         return view("form", ["owner" => $owner]);
    }

    public function editOwner(OwnerRequest $request, Owner $owner)
    {
    //get all of the submitted data
    $data = $request->all();

    $owner->fill($data)->save();

    //  redirect the browser to the new owner
    return redirect("/owners/{$owner->id}");
    }

    public function addAnimal(AnimalRequest $request, Owner $owner)
    {
        //get all of the submitted data
        $data = $request->all();
    
        $owner_id = ['owner_id' => $owner->id];
    
        $data = array_merge($data, $owner_id);
    
        Animal::create($data);
    
            //redirect the browser to the new owner
        return redirect("/owners/{$owner->id}");
    }
    

}
