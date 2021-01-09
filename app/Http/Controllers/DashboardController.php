<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use App\Models\Kendaraan;
use App\Models\Lokasi;
use App\Models\Pembayaran;
use App\Models\Spot;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->level === 'administrator'){
            $data = [
                'lokasi' => Lokasi::count(),
                'spot' => Spot::count(),
                'kendaraan' => Kendaraan::count(),
                'transaksi' => Transaksi::count(),
                'pembayaran' => Pembayaran::count(),
                'pendapatan' => Transaksi::where('status_id', 3)->orWhere('status_id', 2)->sum('total_bayar'),
                'user' => User::where('level', 'user')->count()
            ];
            $pie = [
                'success' => Transaksi::where('status_id', 3)->orWhere('status_id', 2)->count(),
                'failed' => Transaksi::where('status_id', 5)->count(),
                'pending' => Transaksi::where('status_id', 6)->count(),
            ];
            $transaksi = Transaksi::orderBy('created_at', 'DESC')->get()->take(5);
            return view('admin.pages.dashboard',[
                'title' => 'Dashhboard | Admin',
                'data' => $data,
                'pie' => $pie,
                'transaksi' => $transaksi
            ]);
        }else{
            $lokasi = Lokasi::orderBy('nama','asc')->get();
            return view('admin.pages.dashboard2',[
                'title' => 'Dashhboard',
                'lokasi' => $lokasi
            ]);
        }
    }

    public function spot_lokasi(Lokasi $lokasi)
    {
        $spot = Spot::where('lokasi_id', $lokasi->id)->get();
        return view('admin.pages.spot_lokasi',[
            'title' => 'Beberapa spot dari lokasi ' . $lokasi->nama,
            'spot' => $spot
        ]);
    }

    public function booking(Spot $spot)
    {
        $jenis_kendaraan = JenisKendaraan::orderBy('nama','asc')->get();
        return view('pages.booking.create', [
            'title' => 'Booking Spot ' . $spot->nomor . ' di ' . $spot->lokasi->nama,
            'spot' => $spot,
            'jenis_kendaraan' => $jenis_kendaraan
        ]);
    }

    public function booking_store(Request $request, Spot $spot)
    {
        $request->validate([
            'nama_kendaraan' => ['required'],
            'merk' => ['required'],
            'warna' => ['required'],
            'plat' => ['required'],
            'pemilik' => ['required'],
            'jam_masuk' => ['required'],
            'jam_keluar' => ['required'],
        ]);

        $kendaraan = new Kendaraan;

        $kendaraan->nama = $request->nama_kendaraan;
        $kendaraan->jenis_kendaraan_id = $request->jenis_kendaraan_id;
        $kendaraan->warna = $request->warna;
        $kendaraan->merk = $request->merk;
        $kendaraan->plat = $request->plat;
        $kendaraan->pemilik = $request->pemilik;
        $kendaraan->save();

        $total_menit = Carbon::now()->parse($request->jam_masuk)->diffInMinutes($request->jam_keluar,false);
        $total_bayar = ($total_menit/60)*$kendaraan->jenis->tarif;
        
        $transaksi = Transaksi::create([
            'kode' => Str::random('7'),
            'user_id' => auth()->id(),
            'kendaraan_id' => $kendaraan->id,
            'spot_id' => $spot->nomor,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'total_bayar' => $total_bayar,
            'status_id' => 1,
            'bukti_pembayaran' => NULL
        ]);
        
            
        $spot->update([
            'status' => 1
        ]);

        return redirect()->route('dashboard')->with('success','Spot berhasil dibooking.');
    }

}