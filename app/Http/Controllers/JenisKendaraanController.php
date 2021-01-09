<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JenisKendaraanController extends Controller
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
        $items = JenisKendaraan::get();

        return view('admin.pages.jenis_kendaraan.index',[
            'title' => 'Data Jenis Kedaraan',
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
        return view('admin.pages.jenis_kendaraan.create',[
            'title' => 'Tambah Jenis Kendaraan',
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
            'nama' => ['required','unique:jenis_kendaraan,nama'],
            'tarif' => ['required','numeric']
        ]);

        $data = $request->all();
        JenisKendaraan::create($data);
        
        return redirect()->route('jenis-kendaraan.index')->with('success','Jenis Kendaraan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisKendaraan  $jenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisKendaraan $jenisKendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisKendaraan  $jenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisKendaraan $jenisKendaraan)
    {
        return view('admin.pages.jenis_kendaraan.edit',[
            'title' => 'Edit Jenis Kendaraan ' . $jenisKendaraan->nama,
            'item' => $jenisKendaraan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisKendaraan  $jenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisKendaraan $jenisKendaraan)
    {
        $request->validate([
            'nama' => ['required',Rule::unique('jenis_kendaraan','nama')->ignore($jenisKendaraan->id)],
            'tarif' => ['required','numeric']
        ]);

        $data = $request->all();
        $jenisKendaraan->update($data);
        
        return redirect()->route('jenis-kendaraan.index')->with('success','Jenis Kendaraan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisKendaraan  $jenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisKendaraan $jenisKendaraan)
    {
        $jenisKendaraan->delete();
        return redirect()->route('jenis-kendaraan.index')->with('success','Jenis Kendaraan berhasil dihapus.');
    }
}
