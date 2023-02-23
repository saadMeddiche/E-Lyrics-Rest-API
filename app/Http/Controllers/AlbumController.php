<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\User;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        //  $this->authorizeResource(Album::class, 'album');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all(['id', 'title', 'description']);
        return response()->json([
            'status' => 'success',
            'albums' => $albums

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
     * @param  \App\Http\Requests\StoreAlbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumRequest $request)
    {


        $album = new album;
        $album->title = $request->title;
        $album->description = $request->description;
        $album->user_id = Auth::user()->id;
        $album->save();
        return response()->json(['message' => 'Product Added Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $albums = Album::find($id);
        if ($albums) {
            return response()->json([
                'status' => 'success',
                'albums' => $albums
            ]);
        } else {
            return response()->json([
                'message' => 'No Records Found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlbumRequest  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbumRequest $request, $id)
    {
        $album = Album::find($id);
        $this->authorize('update', $album);
            if ($album) {
                $album->title = $request->title;
                $album->description = $request->description;
                $album->update();
                return response()->json(['message' => 'Product Updated Successfully'], 200);
            } else {
                return response()->json([
                    'message' => 'No Records Found'
                ], 404);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $album = Album::find($id);
        $this->authorize('delete', $album);
        if ($album) {
            $album->delete();
            return response()->json(['message' => 'Product Deleted Successfully'], 200);
        } else {
            return response()->json([
                'message' => 'No Records Found'
            ], 404);
        }
    }
}
