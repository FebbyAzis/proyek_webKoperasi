<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Simpanan;
use App\Models\JenisSimpanan;
use PDF;

class LaporanSimpananController extends Controller
{
    public function index()
    {
        $user = Users::all();
        $simpanan = Simpanan::all();
        $jensimp = JenisSimpanan::all();
        // dd($simpanan);
        return view('admin.laporanAll.simpanan.index', compact('user', 'simpanan', 'jensimp')); 
    }
    
    public function show($id)
    {
        $user = Users::all();
        $simpanan = Simpanan::find($id);
        $jensimp = JenisSimpanan::all();
        // dd($simpanan);
        return view('admin.laporanAll.show_simpanan', compact('user', 'simpanan', 'jensimp')); 
    }

    public function cetakSimpanan($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetak = Simpanan::with(['users', 'jenisSimpanan'])->whereDate('created_at', '>=', $tglawal)->
        whereDate('created_at', '<=', $tglakhir)->get();
        $total = 0;

        return view('admin.laporanAll.simpanan.cetak', compact('cetak', 'total'));
    }

    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $simpanan = Simpanan::whereDate('created_at','>=',$start_date)
                            ->whereDate('created_at','<=',$end_date)
                            ->get();
                                
        return view('admin.laporanAll.simpanan.index', compact('simpanan'));
    }

    public function cetak($tglawal, $tglakhir)
    {
        dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        
        // $start_date = $request->start_date;
        // $end_date = $request->end_date;
        
        // $simpanan = Simpanan::whereBetween('created_at',[$start_date, $end_date])
        //                     ->get();
                                
        // return view('admin.laporanAll.simpanan.cetak', compact('simpanan'));
    }
}
