<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Simpanan;
use App\Models\Pinjaman;

class HomeAdminController extends Controller
{
    public function index()
    {

        $anggota = Anggota::count();
        $simpanan = Simpanan::all();
        $pinjaman = Pinjaman::all();
        $total = 0;
        $totals = 0;

        return view('admin.homeAdmin.index', compact('anggota', 'simpanan', 'pinjaman', 'total', 'totals'));
    }

    public function homeAnggota()
    {

        $anggota = Anggota::count();
        $simpanan = Simpanan::all();
        $pinjaman = Pinjaman::all();
        $total = 0;
        $totals = 0;

        return view('user.home.index', compact('anggota', 'simpanan', 'pinjaman', 'total', 'totals'));
    }
}
