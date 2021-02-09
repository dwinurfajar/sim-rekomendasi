<?php

namespace App\Http\Controllers;
use App\tempat;
use App\Rating;
use App\User;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $tempat = DB::table('tempats')->orderBy('rating', 'DESC')->get();
             
        $kategori = Kategori::latest()->get();
        return view('/frontend/index', compact('tempat', 'kategori'));
    }
    public function detail(tempat $id){
    	$tempat = DB::table('tempats')->where('id', $id->id)->first();

        $ratings = DB::table('ratings')
                ->join('users', 'ratings.user_id', '=', 'users.id')
                ->where('ratings.place_id', $id->id)->get();

        $rating = DB::table('ratings')
                ->join('users', 'ratings.user_id', '=', 'users.id')
                ->where('ratings.place_id', $id->id)->avg('ratings.nilai');
        //dd($rating);       
        $rating = number_format((float)$rating, 1, '.', '');
        $rating = ceil($rating);
        
        $kategori = Kategori::latest()->get();
    	return view('frontend/detail', compact('tempat', 'ratings', 'rating', 'kategori'));	
    }
    public function kategori($id)
    {
        //dd($id);
        $tempat = DB::table('tempats')->where('kategori', $id)->get();
        $rating = 30;
        $kategori = Kategori::latest()->get();
        return view('/frontend/index', compact('tempat', 'rating', 'kategori'));
    }
}
