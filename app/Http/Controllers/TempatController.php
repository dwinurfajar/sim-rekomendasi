<?php

namespace App\Http\Controllers;

use App\Rating;
use App\tempat;
use App\Kategori;
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


        
        $tempat = DB::table('tempats')
                    ->join('kategoris', 'tempats.kategori', '=', 'kategoris.id')
                    ->select('tempats.*', 'kategoris.kategori as ktg')
                    ->where('tempats.konfirmasi', '1')
                    ->get();

        $unconfirmed = DB::table('tempats')
                    ->join('kategoris', 'tempats.kategori', '=', 'kategoris.id')
                    ->select('tempats.*', 'kategoris.kategori as ktg')
                    ->where('tempats.konfirmasi', '0')
                    ->get();
        return view('backend/tempat/tempat', compact('tempat', 'unconfirmed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::latest()->get();
        return view('backend/tempat/create', compact('kategori'));
    }
    public function userCreate()
    {
        $kategori = Kategori::latest()->get();
        return view('frontend/create', compact('kategori'));
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
        return redirect('/tempat');
    }
    public function userStore(Request $request)
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

        return redirect('/');
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
        $tempat = DB::table('tempats')->where('id', $tempat->id)->first();
        $kategori = Kategori::latest()->get();
        $ktgr = DB::table('kategoris')->select('kategori')->where('id', $tempat->kategori)->first();
        //dd($ktg);
        return view('backend/tempat/edit', compact('tempat', 'kategori', 'ktgr'));
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
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        tempat::where('id', $tempat->id)->update([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'konfirmasi' => $request->konfirmasi,
        ]);

        if($request->hasFile('thumbnail')){
            $request->file('thumbnail')->move('thumbnails', $request->nama);
        }

        return redirect('/tempat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function destroy(tempat $tempat)
    {
        tempat::destroy($tempat->id);
        return back();
    }
    public function konfirmasi(Request $request, tempat $tempat)
    {
        $request->validate([
            'konfirmasi' => 'required',
        ]);
        tempat::where('id', $tempat->id)->update([
            'konfirmasi' => $request->konfirmasi,
        ]);
        return redirect('/tempat');
    }
}
