<?php

namespace App\Http\Controllers;

use App\tempat;
use Illuminate\Http\Request;

class TempatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend/tempat/tempat');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/tempat/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function show(tempat $tempat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function edit(tempat $tempat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tempat $tempat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function destroy(tempat $tempat)
    {
        //
    }
}
