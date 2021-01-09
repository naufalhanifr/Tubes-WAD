<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LokasiController extends Controller
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
        $lokasi = Lokasi::orderBy('created_at','desc')->get();

        return view('admin.pages.lokasi.index',[
            'title' => 'Data Lokasi',
            'lokasi' => $lokasi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.lokasi.create',[
            'title' => 'Tambah Lokasi',
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
            'nama' => ['required','unique:lokasi,nama'],
            'alamat' => ['required']
        ]);
        
        $data = $request->all();
        if($request->hasFile('foto')){
            $data['foto'] = $request->file('foto')->store('lokasi','public');
        }else{
            $data['foto'] = NULL;
        }
        Lokasi::create($data);

        return redirect()->route('lokasi.index')->with('success','Lokasi baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(Lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokasi $lokasi)
    {
        return view('admin.pages.lokasi.edit',[
            'title' => 'Edit Lokasi',
            'lokasi' => $lokasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        $request->validate([
            'nama' => ['required', Rule::unique('lokasi','nama')->ignore($lokasi->id)],
            'alamat' => ['required']
        ]);
        $data = $request->all();
        if($request->hasFile('foto')){
            if($lokasi->foto !== NULL){
                unlink('storage/' . $lokasi->foto);
            }
            $data['foto'] = $request->file('foto')->store('lokasi','public');
        }else{
            $data['foto'] = $lokasi->foto;
        }
        $lokasi->update($data);

        return redirect()->route('lokasi.index')->with('success','Lokasi baru berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $lokasi)
    {
        if($lokasi->foto !== NULL){
            unlink('storage/' . $lokasi->foto);
        }
        $lokasi->delete();
        return redirect()->route('lokasi.index')->with('success','Lokasi baru berhasil didelete.');
    }
}
