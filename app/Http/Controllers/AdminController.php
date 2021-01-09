<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Lokasi;
use App\Models\Pembayaran;
use App\Models\Spot;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'lokasi' => Lokasi::count(),
            'spot' => Spot::count(),
            'kendaraan' => Kendaraan::count(),
            'transaksi' => Transaksi::count(),
            'pembayaran' => Pembayaran::count(),
            'pendapatan' => Transaksi::where('status','sucess')->sum('total_biaya')
        ];
        return view('admin.pages.dashboard',[
            'title' => 'Dashhboard | Admin',
            'data' => $data
        ]);
    }

    public function profile()
    {
        $admin = User::where('id',auth()->id())->first();

        return view('admin.pages.profile',[
            'title' => 'Profile ' . $admin->name,
            'admin' => $admin
        ]);
    }
    public function edit_profile()
    {
        $admin = User::where('id',auth()->id())->first();

        return view('admin.pages.edit_profile',[
            'title' => 'Profile ' . $admin->name,
            'admin' => $admin
        ]);
    }
    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'avatar' => ['image','mimes:jpg,jpeg,png']
        ]);

        $admin = User::where('id',auth()->id())->first();

        if($request->hasFile('avatar')){
            if($admin->avatar !== NULL){
                unlink('storage/' . $admin->avatar);
            }
            $avatar = $request->file('avatar')->store('avatar','public');
        }else{
            $avatar = NULL;
        }
        User::where('id',$admin->id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'avatar' => $avatar
        ]);

        return redirect()->route('profile')->with('success','Profile berhasil diupdate.');
    }
    
    public function edit_password()
    {
        $admin = User::where('id',auth()->id())->first();

        return view('admin.pages.edit_password',[
            'title' => 'Profile ' . $admin->name,
            'admin' => $admin
        ]);
    }

    public function update_password(Request $request)
    {
        // $request->validate([
        //     'password' => ['required'],
        //     'password_baru' => ['required','confirmed'],
        // ]);
        $admin = User::where('id',auth()->id())->first();
        dd($admin->name);
        if($admin->password === bcrypt('password')){
            return 'Password benar';
        }else{
            return 'Password salah';
        }
        // if(decrypt($admin->password) === $request->password){
        //     $admin->update([
        //         'password' => bcrypt($request->password)
        //     ]);
        //     return redirect()->route('profile')->with('success','Profile berhasil diupdate.');
        // }else{
        //     return redirect()->route('edit-password')->with('failed','Password Lama salah');
        // }
    }

}
