<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simpanan;
use App\Models\JenisSimpanan;
use App\Models\Users;
use App\Models\Penarikan;
use App\Models\DetailSimpanan;

class SimpananController extends Controller
{
    public function index()
    {
        $data = Simpanan::all();
        $jenis = JenisSimpanan::all();
        $user = Users::all();

        return view('admin.simpanan.index', compact('data', 'jenis', 'user'));
    }

    public function store(Request $request)
    {
        $save = new Simpanan;
        $save->users_id = $request->users_id;
        $save->jenissimpanan_id = $request->jenissimpanan_id;  
        $save->jumlahSimpanan = $request->jumlahSimpanan;  
        $save->save(); 
        return redirect()->back()->with('Success', 'Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        

        Simpanan::where('id', $id)->update([
           
            // 'anggota_id' => $request->anggota_id,
            // 'jenissimpanan_id' => $request->jenissimpanan_id,
            'jumlahSimpanan' => $request->jumlahSimpanan,
        ]);

        return redirect()->back()->with('Success', 'Data Anggota Berhasil Diedit');
    }

    public function destroy($id)
    {
        Simpanan::where('id', $id)->delete();
        return redirect()->back();
    }

    public function show($id)
    {

        $data['data'] = Simpanan::find($id);
        $data['penarikan'] = Penarikan::where('simpanan_id', $id)->get();
        // dd($data);
        return view('admin.simpanan.show', $data);
    }

}
