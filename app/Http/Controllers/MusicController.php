<?php

namespace App\Http\Controllers;

use App\Http\Requests\MusicFormRequest;
use App\Models\Music;
use Illuminate\Http\Request;
use function response;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Music::all();
        if (count($songs) === 0) {
            return response()->json(
                [
                    'message' => 'No songs found'
                ]
            );
        }
        return response()->json(Music::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\MusicFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MusicFormRequest $request)
    {
        $this->authorize('store', Music::class);
        $validated = $request->validated();

            $music = Music::create($validated);
            return response()->json([
                'code' => 201,
                'message' => 'Song created',
                'song' => $music
            ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function show(Music $music)
    {
        if($music === null){
            return response()->json([
                'message' => 'Song not found'
            ]);
        }else{
            return response()->json([
                'message' => 'Song found',
                'song' => $music
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function update(MusicFormRequest $request, Music $music)
    {
        $this->authorize('update', $music);
        $validated = $request->validated();
        $music->update($validated);
        return response()->json([
            'message' => 'Song updated',
            'song' => $music
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function destroy(Music $music)
    {
        $this->authorize('delete', $music);
        if($music === null){
            return response()->json([
                'message' => 'Song not found'
            ]);
        }else{
            $music->delete();
            return response()->json([
                'message' => 'Song deleted'
            ]);
        }
    }
}
