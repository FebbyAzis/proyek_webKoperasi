<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JasaAnggota;
use App\Models\Users;

class JasaAnggotaController extends Controller
{
    public function index()
    {
        $data = JasaAnggota::all();
        $user = Users::all();
        return view('admin.jasaAnggota.index', compact('data', 'user'));
    }

    public function store(Request $request)
    {
        $save = new JasaAnggota;
        $save->users_id = $request->users_id;
        $save->hutangBarang = $request->hutangBarang;  
        $save->hutangUang = $request->hutangUang; 
        $save->save(); 
        return redirect()->back()->with('Success', 'Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        JasaAnggota::where('id', $id)->update([
            'hutangBarang' => $request->hutangBarang,
            // 'anggota_id' => $request->anggota_id,
            // 'jenissimpanan_id' => $request->jenissimpanan_id,
            'hutangUang' => $request->hutangUang,
        ]);

        return redirect()->back()->with('Success', 'Data Anggota Berhasil Diedit');
    }

    public function destroy($id)
    {
        JasaAnggota::where('id', $id)->delete();
        return redirect()->back();
    }

}
