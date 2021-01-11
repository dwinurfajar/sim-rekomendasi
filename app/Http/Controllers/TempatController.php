<?php

namespace App\Http\Controllers;

use App\tempat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TempatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tempat = DB::table('tempats')->get();
        return view('backend/tempat/tempat', compact('tempat'));
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
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'thumbnail' => 'image|required|max:1024',
        ]);

        $tempat = new tempat;
        $tempat->nama = $request->nama;
        $tempat->lokasi = $request->lokasi;
        $tempat->kategori = $request->kategori;
        $tempat->deskripsi = $request->deskripsi;
        $tempat->thumbnail = $request->nama;
        $tempat->save();

        if($request->hasFile('thumbnail')){
            $request->file('thumbnail')->move('thumbnails', $request->nama);
        } 

        return view('backend/tempat/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function show(tempat $tempat)
    {
        echo "asdasda";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function edit(tempat $tempat)
    {
        //echo $tempat->nama;
        $tempat = DB::table('tempats')->where('id', $tempat->id)->first();
        //dd($tempat);
        return view('backend/tempat/edit', compact('tempat'));
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
