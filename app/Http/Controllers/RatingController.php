<?php

namespace App\Http\Controllers;

use App\Rating;
use App\User;
use App\tempat;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'place_id' => 'required',
            'nilai' => 'required',
            'ulasan' => 'required',
        ]);

        $rating = new Rating;
        $rating->place_id = $request->place_id;
        $rating->user_id = $user->id;
        $rating->nilai = $request->nilai;
        $rating->ulasan = $request->ulasan;
        $rating->save();

        
        $rtg = DB::table('ratings')
                ->groupBy('ratings.place_id')
                ->select('ratings.place_id', Db::raw('avg(ratings.nilai) as rtg'))
                ->where('ratings.place_id', '=',  $request->place_id)
                ->get();
        //dd($rtg);
        $rtg[0]->rtg = number_format((float)$rtg[0]->rtg, 1, '.', '');

        tempat::where('id', $request->place_id)->update([
            'rating' => $rtg[0]->rtg,
        ]);
        

        //return redirect('/detail/$request->id');
        return back();
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
