<?php

namespace App\Http\Controllers;

use App\Models\parole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ParoleFormValidation;

class ParoleController extends Controller
{
    // Show All Paroles
    public function index()
    {
        //Policie
        $this->authorize('viewAny');

        //fetch all paroles
        $paroles = parole::all();

        //return all paroles in json format
        return response()->json(['paroles' => $paroles]);
    }

    // Show All Paroles
    public function show($id)
    {
        //Fetch parole
        $parole = parole::find($id);

        //Return a "Fail Message" if no parole has been found with that given ID
        if (!$parole) {
            return response()->json(['message' => 'No parole Found'], 404);
        }

        //Policie
        $this->authorize('view', $parole);

        //Return all paroles in json format
        return response()->json(['paroles' => $parole]);
    }

    // Add  One Parole
    public function store(ParoleFormValidation $request)
    {
        //Policie
        $this->authorize('create');

        //store the validated data from the request , and store it in an associative array
        $data = $request->validated();

        //new instance
        $parole = new parole();

        //afect the validated data to the new object
        $parole->Parole = $data["Parole"];
        $parole->Langue = $data["Langue"];
        $parole->ID_Music = $data["ID_Music"];
        $parole->User_Id = Auth::user()->id;


        //Insert the new parole to the DB
        $parole->save();

        //Return a success message
        return response()->json(['message' => 'Parole Added Successfuly']);
    }

    // Update A Parole
    public function update(ParoleFormValidation $request, $id)
    {
        //store the validated data from the request , and store it in an associative array
        $data = $request->validated();

        //Find the choosen parole to update
        $parole = parole::find($id);

        //Return a "Fail Message" if no parole has been found with that given ID
        if (!$parole) {
            return response()->json(['message' => 'No parole Found'], 404);
        }

        //Policie
        $this->authorize('update', $parole);

        //afect the new data to the choosen object
        $parole->Parole = $data["Parole"];
        $parole->Langue = $data["Langue"];
        $parole->ID_Music = $data["ID_Music"];

        //Update the data of that parole
        $parole->update();

        //Return a success message
        return response()->json(['message' => 'Parole Updated Successfuly'], 200);
    }

    //Delete Parole
    public function destroy($id)
    {
        //Find the choosen parole to delete
        $parole = parole::find($id);

        //Policie
        $this->authorize('delete', $parole);

        //Return a "Fail Message" if no parole has been found with that given ID
        if (!$parole)  return response()->json(['message' => 'Parole Not Found']);

        //delete choosed parole
        $parole->delete();

        //Return a success message
        return response()->json(['message' => 'Parole Deleted Successfuly']);
    }
}
