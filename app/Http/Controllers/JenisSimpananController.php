<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSimpanan;

class JenisSimpananController extends Controller
{
    public function index()
    {
        $data = JenisSimpanan::all();
        return view('admin.jenisSimpanan.index', compact('data'));
    }

    public function store(Request $request)
    {
        $save = new JenisSimpanan;
        $save->namaSimpanan = $request->namaSimpanan; 
        $save->save(); 
        return redirect()->back()->with('Success', 'Ditambahkan');
    }

    public function update(Request $request, $id)
    {
    
        JenisSimpanan::where('id', $id)->update([
            'namaSimpanan' => $request->namaSimpanan,
        ]);

        return redirect()->back()->with('Success', 'Data Anggota Berhasil Diedit');
    }

    public function destroy($id)
    {
        JenisSimpanan::where('id', $id)->delete();
        return redirect()->back();
    }
}
