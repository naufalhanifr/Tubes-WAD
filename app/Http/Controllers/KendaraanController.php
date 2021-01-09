<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
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
        $items = Kendaraan::with('jenis')->orderBy('created_at', 'DESC')->get();

        return view('admin.pages.kendaraan.index',[
            'title' => 'Data Kendaraan',
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_kendaraan = JenisKendaraan::get();
        return view('admin.pages.kendaraan.create',[
            'title' => 'Tambah Kendaraan',
            'jenis_kendaraan' => $jenis_kendaraan
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
            'nama' => ['required'],
            'merk' => ['required'],
            'warna' => ['required'],
            'plat' => ['required'],
            'pemilik' => ['required'],
        ]);
        $data = $request->all();

        Kendaraan::create($data);

        return redirect()->route('kendaraan.index')->with('success','Kendaraan Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kendaraan $kendaraan)
    {
        $jenis_kendaraan = JenisKendaraan::get();
        return view('admin.pages.kendaraan.edit',[
            'title' => 'Edit Kendaraan ' . $kendaraan->nama,
            'jenis_kendaraan' => $jenis_kendaraan,
            'item' => $kendaraan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        $request->validate([
            'nama' => ['required'],
            'merk' => ['required'],
            'warna' => ['required'],
            'plat' => ['required'],
            'pemilik' => ['required'],
        ]);
        $data = $request->all();

        $kendaraan->update($data);

        return redirect()->route('kendaraan.index')->with('success','Kendaraan Berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();
        return redirect()->route('kendaraan.index')->with('success','Kendaraan Berhasil dihapus.');
    }
}
