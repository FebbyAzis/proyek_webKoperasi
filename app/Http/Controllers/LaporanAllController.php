<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\Models\Users;
use App\Models\Simpanan;
use App\Models\Pinjaman;
use App\Models\SHUAnggota;
use App\Models\JasaAnggota;
use App\Models\JenisSimpanan;
use App\Models\JenisPinjaman;
use App\Models\LaporanAll;
use DB;

class LaporanAllController extends Controller
{
    // public function index ()
    // {
    //     $user = Users::orderBy('id')->get();
    //     $simpanan = DB::table('simpanan')->join('users', 'simpanan.users_id', 'users.id')
    //     ->select('simpanan.*', 'users.name')->latest()->paginate(5);
    //     $simp = DB::table('simpanan')->join('jenissimpanan', 'simpanan.jenissimpanan_id', 'jenissimpanan.id')
    //     ->select('jenissimpanan.*', 'jenissimpanan.namasimpanan')->latest()->paginate(5);
    //     $data = LaporanAll::all();
    //     $pinjaman = Pinjaman::all();
    //     $shuAnggota = SHUAnggota::all();
    //     $jasaAnggota = JasaAnggota::orderBy('users_id')->get();
    //     // dd($user);
    //     $jensimp = JenisSimpanan::all();
    //     $jenpinj = JenisPinjaman::all();
    //     return view('admin.laporanAll.index', compact('user', 'simpanan', 'jensimp', 'jenpinj', 'data', 'jasaAnggota', 'simp'));
    // }

   

    public function laporanSimpanans($id)
    {
        $user = Users::all();
        $simpanan = Simpanan::find($id);
        $jensimp = JenisSimpanan::all();
        dd($simpanan);
        return view('admin.laporanAll.laporanSimpanan', compact('user', 'simpanan', 'jensimp')); 
    }
   
    public function index(Request $request)
    {
        // $dataFromTable1 = DB::table('users')->get();
        // $dataFromTable2 = DB::table('simpanan')->get();
        // $dataFromTable3 = DB::table('pinjaman')->get();

        // $mergedData = $dataFromTable1->concat($dataFromTable2)->concat($dataFromTable3);
      

        // return view('admin.laporanAll.index', compact('mergedData', 'dataFromTable1', 'dataFromTable2'));
        $user = Users::all();
        $simp = Simpanan::orderBy('jumlahSimpanan')->get();
        $pinj = Pinjaman::orderBy('jenispinjaman_id')->get();
        // dd($simp);

        return view('admin.laporanAll.index', compact('user', 'simp'));
    }

    public function laporanPinjaman()
    {
        $user = Users::all();
        $pinjaman = Pinjaman::all();
        $jenpinj = JenisPinjaman::all();

        return view('admin.laporanAll..pinjaman.index', compact('user', 'pinjaman', 'jenpinj'));
    }

    public function cetakPinjaman($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetak = Pinjaman::with(['users', 'jenisPinjaman'])->whereDate('created_at', '>=', $tglawal)->
        whereDate('created_at', '<=', $tglakhir)->get();
        $total = 0;

        return view('admin.laporanAll.pinjaman.cetak', compact('cetak', 'total'));
    }

    public function filterPinjaman(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $pinjaman = Pinjaman::whereDate('created_at','>=',$start_date)
                            ->whereDate('created_at','<=',$end_date)
                            ->get();
                                
        return view('admin.laporanAll.pinjaman.index', compact('pinjaman'));
    }

    public function laporanJasa()
    {
        $user = Users::all();
        $jasa = JasaAnggota::all();

        return view('admin.laporanAll.jasaAnggota.index', compact('user', 'jasa'));
    }

    public function cetakJasa($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetak = JasaAnggota::with(['users'])->whereDate('created_at', '>=', $tglawal)->
        whereDate('created_at', '<=', $tglakhir)->get();
        $total = 0;
        $totals = 0;

        return view('admin.laporanAll.jasaAnggota.cetak', compact('cetak', 'total', 'totals'));
    }

    public function filterJasa(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $jasa = JasaAnggota::whereDate('created_at','>=',$start_date)
                            ->whereDate('created_at','<=',$end_date)
                            ->get();
                                
        return view('admin.laporanAll.jasaAnggota.index', compact('jasa'));
    }

    public function laporanSHU()
    {
        $user = Users::all();
        $shu = SHUAnggota::all();

        return view('admin.laporanAll.shuAnggota.index', compact('user', 'shu'));
    }

    public function cetakSHU($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetak = SHUAnggota::with(['users'])->whereDate('created_at', '>=', $tglawal)->
        whereDate('created_at', '<=', $tglakhir)->get();
        $total = 0;
        $totals = 0;

        return view('admin.laporanAll.shuAnggota.cetak', compact('cetak', 'total', 'totals'));
    }

    public function filterSHU(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $shu = SHUAnggota::whereDate('created_at','>=',$start_date)
                            ->whereDate('created_at','<=',$end_date)
                            ->get();
                                
        return view('admin.laporanAll.shuAnggota.index', compact('shu'));
    }

}
