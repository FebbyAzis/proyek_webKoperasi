<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPinjaman;

class JenisPinjamanController extends Controller
{
    public function index()
    {
        $data = JenisPinjaman::all();
        return view('admin.jenisPinjaman.index', compact('data'));
    }

    public function store(Request $request)
    {
        $save = new JenisPinjaman;
        $save->namaPinjaman = $request->namaPinjaman; 
        $save->save(); 
        return redirect()->back()->with('Success', 'Ditambahkan');
    }

    public function update(Request $request, $id)
    {
    
        JenisPinjaman::where('id', $id)->update([
            'namaPinjaman' => $request->namaPinjaman,
        ]);

        return redirect()->back()->with('Success', 'Data Anggota Berhasil Diedit');
    }

    public function destroy($id)
    {
        JenisPinjaman::where('id', $id)->delete();
        return redirect()->back();
    }
}
