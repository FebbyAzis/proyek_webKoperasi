<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simpanan;
use App\Models\DetailSimpanan;

class DetailSimpananController extends Controller
{
    public function show($id)
    {

        $simpanan = Simpanan::find($id);
        $data = DetailSimpanan::where('simpanan_id', $id)->get();
        $total = 0;
        return view('admin.detailSimpanan.show', compact('data', 'simpanan', 'total'));
    }

    public function store(Request $request)
    {
        
        // $data = Simpanan::find($request->id);
        // $total =  $request->jumlah + $data['jumlahSimpanan'];

        $save = new DetailSimpanan;
        $save->simpanan_id = $request->simpanan_id;
        $save->tanggal = $request->tanggal;  
        $save->jumlah = $request->jumlah;  
        $save->save(); 
        return redirect()->back()->with('Success', 'Ditambahkan');
    }

   
    
}
