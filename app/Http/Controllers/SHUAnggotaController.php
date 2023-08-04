<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SHUAnggota;
use App\Models\Users;

class SHUAnggotaController extends Controller
{
    public function index()
    {
        $data = SHUAnggota::all();
        $user = Users::all();
        return view('admin.shuAnggota.index', compact('data' ,'user'));
    }

    public function store(Request $request)
    {
        $save = new SHUAnggota;
        $save->users_id = $request->users_id;
        $save->simpanan = $request->simpanan;  
        $save->hutang = $request->hutang; 
        $save->save(); 
        return redirect()->back()->with('Success', 'Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        SHUAnggota::where('id', $id)->update([
            'simpanan' => $request->simpanan,
            // 'anggota_id' => $request->anggota_id,
            // 'jenissimpanan_id' => $request->jenissimpanan_id,
            'hutang' => $request->hutang,
        ]);

        return redirect()->back()->with('Success', 'Data Anggota Berhasil Diedit');
    }

    public function destroy($id)
    {
        SHUAnggota::where('id', $id)->delete();
        return redirect()->back();
    }
}
