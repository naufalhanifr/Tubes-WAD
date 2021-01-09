<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Spot;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function __construct()
    {
        // $this->middleware('is_admin', ['only' => 'set_status']);
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if(auth()->user()->level === 'administrator'){
            $items = Transaksi::with('spot','user','kendaraan')->orderBy('created_at','DESC')->get();
        }else{
            $items = Transaksi::with('spot','user','kendaraan')->orderBy('created_at','DESC')->where('user_id', auth()->id())->get();
        }

        return view('admin.pages.transaksi.index',[
            'title' => 'Data Transaksi',
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
        //
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
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        $total_menit = Carbon::now()->parse($transaksi->jam_masuk)->diffInMinutes($transaksi->jam_keluar,false);
        $total_jam = number_format($total_menit/60,2);
        return view('admin.pages.transaksi.show',[
            'title' =>'Detail Transaksi ' . $transaksi->kode,
            'item' => $transaksi,
            'total_jam' => $total_jam
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        if($transaksi->status_id == 1 || $transaksi->status_id == 2 || $transaksi->status_id == 4 || $transaksi->status_id == 6){
            $transaksi->spot->update([
                'status' => 0
            ]);
        }
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success','Transaksi berhasil dihapus.');
    }

    public function set_status(Request $request, Transaksi $transaksi)
    {   
        if(!$request->status_id){
            $transaksi->status_id = 3;
        }else{
            $transaksi->status_id = $request->status_id;
        }
        
        $transaksi->save();

       if($transaksi->status_id == 5 || $transaksi->status_id == 3){
            Spot::where('id', $transaksi->spot_id)->update(['status' => 0]);
        }elseif($transaksi->status_id == 1 || $transaksi->status_id == 4 || $transaksi->status_id ==6){
            Spot::where('id', $transaksi->spot_id)->update(['status' => 1]);
        }

        return redirect()->route('transaksi.index')->with('success','Status Transaksi berhasil diubah.');
    }

    public function transaksi_upload(Transaksi $transaksi)
    {
        $pembayaran = Pembayaran::get();
        return view('admin.pages.transaksi.upload',[
            'title' => 'Metode Pembayaran',
            'transaksi' => $transaksi,
            'pembayaran' => $pembayaran
        ]);
    }

    public function transaksi_upload_update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'bukti_pembayaran' => ['required','image','mimes:jpg,png']
        ]);
        $bukti_pembayaran = $request->file('bukti_pembayaran')->store('bukti_pembayaran','public');
        $transaksi->where('id', $transaksi->id)->update([
            'status_id' => 6,
            'bukti_pembayaran' => $bukti_pembayaran
        ]);

        return redirect()->route('transaksi.index')->with('success','Bukti pembayaran berhasil diupload.');
    }
}
