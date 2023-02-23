<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artist = Artist::all();

        return response()->json([
            'status' => 'success',
            'artist' => $artist
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArtistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtistRequest $request)
    {
        DB::table('artists')->insert([
            'name' => $request->name,
            'id_user' => Auth::user()->id,
        ]);

        return response()->json([
            'message' => 'Successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $is_find = Artist::find($id);
        
        if (!$is_find) {
            return response()->json([
                'message' => 'Artist not found'
            ], 404);
        }
            
        return response()->json([
            'status' => 'success',
            'artist' => $is_find
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArtistRequest  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtistRequest $request, $id)
    {
        $is_find = Artist::find($id);

        if ($is_find)
        {
            $is_find->name = $request->name;
            $is_find->id_user = Auth::user()->id;
            $is_find->update();

            return response()->json([
                'message' => 'Artist Updated Successfull'
            ]);
        } else {

            return response()->json([
                'message' => 'No Records Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $is_deleted = DB::table('artists')->where('id', $id)->delete();
        
        if ($is_deleted)
            return response()->json(['message' => 'artist deleted successfully'], 200);
        else
        return response()->json(['message' => 'No artist Found'], 404);
    }
}
