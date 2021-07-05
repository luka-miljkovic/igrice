<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameRestController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET /games
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
      $games=Game::all();
      return response()->json($games,200);
    }

    /**
     * Store a newly created resource in storage.
     *  POST /games
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $input=$request->all();
            $game=Game::create($input);
            return response()->json($game,200);
        } catch (Throwable $th) {
            return response()->json($th,503);
        }
        
    }

    /**
     * Display the specified resource.
     *  GET /games/{id}
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
       if(isset($game)){
        return response()->json($game,200);
       }
       return response()->json(null,404);
    }

    /**
     * Update the specified resource in storage.
     * PUT /games/{id}
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        if(!isset($game)){
            return response()->json(null,404);
        }
        try {
            if(isset($request->name)){
                $game->name=$request->name;
            }
            if(isset($request->genre_id)){
                $game->genre_id=$request->genre_id;
            }
            if(isset($request->image)){
                $game->image=$request->image;
            }
            if(isset($request->min_age)){
                $game->min_age=$request->min_age;
            }
            if(isset($request->price)){
                $game->price=$request->price;
            }
            $game->save();

            return response()->json($game,200);
        } catch (\Throwable $th) {
            return response()->json($th,503);
        }

    }

    /**
     * Remove the specified resource from storage.
     *  DELETE /games/{id}
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        if(!isset($game)){
            return response()->json(null,404);
        }
        try {
            $game->delete();
            return  response()->json(null,204);
        } catch (\Throwable $th) {
            return  response()->json($th,503);
        }
    }
}
