<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Spot;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spot = Spot::with('lokasi')->orderBy('lokasi_id','desc')->get();

        return view('admin.pages.spot.index',[
            'title' => 'Data Spot',
            'spot' => $spot
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lokasi = Lokasi::orderBy('created_at','DESC')->get();
        return view('admin.pages.spot.create',[
            'title' => 'Tambah Spot',
            'lokasi' => $lokasi
        ]);
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
            'nomor' => ['required']
        ]);
        
        $data = $request->all();

        Spot::create($data);

        return redirect()->route('spot.index')->with('success','Spot baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spot  $spot
     * @return \Illuminate\Http\Response
     */
    public function show(Spot $spot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spot  $spot
     * @return \Illuminate\Http\Response
     */
    public function edit(Spot $spot)
    {
        $lokasi = Lokasi::orderBy('created_at','DESC')->get();
        return view('admin.pages.spot.edit',[
            'title' => 'Edit Spot ' . $spot->nomor,
            'lokasi' => $lokasi,
            'spot' => $spot
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spot  $spot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spot $spot)
    {
        $request->validate([
            'nomor' => ['required']
        ]);
        
        $data = $request->all();

        $spot->update($data);

        return redirect()->route('spot.index')->with('success','Spot baru berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spot  $spot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spot $spot)
    {
        $spot->delete();
        return redirect()->route('spot.index')->with('success','Spot baru berhasil dihapus.');
    }
}
