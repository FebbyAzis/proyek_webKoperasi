<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Pinjaman;
use App\Models\JenisPinjaman;
use App\Models\Angsuran;

class AngsuranController extends Controller
{
    // public function index()
    // {
    //     $pinjaman = Pinjaman::all();
    //     $jenis = JenisPinjaman::all();
    //     $user = Users::all();
    //     $data = Angsuran::all();
    //     return view('admin.angsuran.index', compact('data', 'pinjaman', 'user', 'jenis'));
    // }

    public function store(Request $request)
    {
        
        // $data = Simpanan::find($request->id);
        // $total =  $request->jumlah + $data['jumlahSimpanan'];

        $save = new Angsuran;
        $save->pinjaman_id = $request->pinjaman_id;
        $save->tglAngsuran = $request->tglAngsuran;  
        $save->bungaAngsuran = $request->bungaAngsuran;  
        $save->save(); 
        
        return redirect()->back()->with('Success', 'Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        Angsuran::where('id', $id)->update([
            'tanggal' => $request->tanggal,
            // 'anggota_id' => $request->anggota_id,
            'jenispinjaman_id' => $request->jenispinjaman_id,
            'jumlah' => $request->jumlah,
            'lama' => $request->lama,
            'bunga' => $request->bunga,
        ]);

        return redirect()->back()->with('Success', 'Data Anggota Berhasil Diedit');
    }

    public function destroy($id)
    {
        Angsuran::where('id', $id)->delete();
        return redirect()->back();
    }

    // public function show($id)
    // {

    //     $data['data'] = Angsuran::find($id);
    //     // dd($data);
    //     return view('admin.pinjaman.show', $data);
    // }

    // public function show($id)
    // {

    //     $simpanan = Simpanan::find($id);
    //     $data = angsuran::where('simpanan_id', $id)->get();
    //     $total = 0;
    //     return view('admin.pinjaman.show', compact('data', 'simpanan', 'total'));
    // }


}
