<?php

namespace App\Http\Controllers;

use App\tempat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tempat = DB::table('tempats')->get();
        $rating = 25;
        return view('/frontend/index', compact('tempat', 'rating'));
    }
    public function user(){
        $user = DB::table('users')->get();
        return view('/backend/user', compact('user'));
    }
}
