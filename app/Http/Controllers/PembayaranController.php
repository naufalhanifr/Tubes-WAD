<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
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
        $items = Pembayaran::get();

        return view('admin.pages.pembayaran.index',[
            'title' => 'Data Pembayaran',
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
        return view('admin.pages.pembayaran.create',[
            'title' => 'Tambah Metode Pembayaran',
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
            'nomor' => ['required','numeric']
        ]);

        $data = $request->all();
        Pembayaran::create($data);
        
        return redirect()->route('pembayaran.index')->with('success','Metode Pembayaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        return view('admin.pages.pembayaran.edit',[
            'title' => 'Edit Metode Pembayaran',
            'item' => $pembayaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'nama' => ['required'],
            'nomor' => ['required','numeric']
        ]);

        $data = $request->all();
        $pembayaran->update($data);
        
        return redirect()->route('pembayaran.index')->with('success','Metode Pembayaran berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success','Metode Pembayaran berhasil dihapus.');
    }
}
