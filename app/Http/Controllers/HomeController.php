<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('welcome',[
            'title' => 'Smart Parkir',
        ]);
    }
}
