<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simpanan;
use App\Models\Anggota;
use App\Models\Pinjaman;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $anggota = Anggota::count();
        $simpanan = Simpanan::all();
        $pinjaman = Pinjaman::all();
        $total = 0;
        $totals = 0;

        return view('welcome', compact('anggota', 'simpanan', 'pinjaman', 'total', 'totals'));
    }
}
