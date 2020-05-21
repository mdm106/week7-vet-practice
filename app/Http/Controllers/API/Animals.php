<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AnimalRequest as Request;
use App\Animal;
use App\Http\Resources\API\AnimalResource;

class Animals extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the animals
        return Animal::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only("name", "type", "dob", "weight_kg", "height_cm", "owner_id", "biteyness");

        //store owner in a variable
        $animal = Animal::create($data)->addTreatments($request->get("treatments"));

        //return the resource
        return new AnimalResource($animal);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        return new AnimalResource($animal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        //get the request data
        $data = $request->only("name", "type", "dob", "weight_kg", "height_cm", "owner_id", "biteyness");

        //update the animal using the fill method, then save it to the database
        $animal->fill($data)->save();

        // use the new method - can't chain as save returns a bool
        $animal->addTreatments($request->get("treatments"));

        //return the updated version
        return new AnimalResource($animal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();

        //use a 204 code as there is no content in the response
        return response(null, 204);
    }
}
