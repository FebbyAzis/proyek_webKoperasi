<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\JenisPinjaman;
use App\Models\Pinjaman;
use App\Models\Angsuran;

class PinjamanController extends Controller
{
    public function index()
    {
        $data = Pinjaman::all();
        $jenis = JenisPinjaman::all();
        $user = Users::all();
        return view('admin.pinjaman.index', compact('data', 'jenis', 'user'));
    }

    public function store(Request $request)
    {
        $save = new Pinjaman;
        $save->tanggal = $request->tanggal; 
        $save->users_id = $request->users_id;
        $save->jenispinjaman_id = $request->jenispinjaman_id;
        $save->jumlahPinjaman = $request->jumlahPinjaman;  
        $save->lama = $request->lama; 
        $save->bunga = $request->bunga; 
        $save->save(); 
        return redirect()->back()->with('Success', 'Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        Pinjaman::where('id', $id)->update([
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
        Pinjaman::where('id', $id)->delete();
        return redirect()->back();
    }

    public function show($id)
    {

        $data = Pinjaman::find($id);
        $angsuran = Angsuran::all();
        $total = 0;
        $bungas = 2500;
        // dd($data);
        return view('admin.pinjaman.show', compact('data', 'angsuran', 'total', 'bungas'));
    }
}
