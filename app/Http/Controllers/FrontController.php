<?php

namespace App\Http\Controllers;
use App\tempat;
use App\Rating;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $tempat = DB::table('tempats')->get();
        $rating = 25;
        return view('/frontend/index', compact('tempat', 'rating'));
    }
    public function detail(tempat $id){
    	$tempat = DB::table('tempats')->where('id', $id->id)->first();
        //$rating = DB::table('ratings')->where('place_id', $id->id)->get();

        $rating = DB::table('ratings')
                ->join('users', 'ratings.user_id', '=', 'users.id')
                ->where('ratings.place_id', $id->id)->get();
        //dd($rtg);

    	return view('frontend/detail', compact('tempat', 'rating'));	
    }
}
