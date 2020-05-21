<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\OwnerStoreRequest as Request;
use App\Owner;
use App\Http\Resources\API\OwnerResource;

class Owners extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the owners
        return Owner::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get all the request data
        //returns an array of all the data the user sent
        $data = $request->all();

        //store owner in a variable
        $owner = Owner::create($data);

        //return the resource
        return new OwnerResource($owner);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        //just return the owner resource
        return new OwnerResource($owner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        //get the request data
        $data = $request->all();

        //update the article using the fill method, then save it to the database
        $owner->fill($data)->save();

        //return the updated version
        return new OwnerResource($owner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        //delete the owner from the DB
        $owner->delete();

        //use a 204 code as there is no content in the response
        return response(null, 204);
    }
}
