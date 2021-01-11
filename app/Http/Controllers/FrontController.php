<?php

namespace App\Http\Controllers;
use App\tempat;
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
    	return view('frontend/detail', compact('tempat'));	
    }
}
