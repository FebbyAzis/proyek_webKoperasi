<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penarikan;
use App\Models\Simpanan;
use App\Models\Users;
use App\Models\JenisSimpanan;

class PenarikanController extends Controller
{
    // public function index()
    // {
        
    //     $simpanan = Simpanan::find($id);
    //     $data = Penarikan::all();
    //     $total = 0;
    //     return view('admin.penarikan.index', compact('data', 'simpanan', 'data'));
    // }

    public function store(Request $request)
    {
        
        // $data = Simpanan::find($request->id);
        // $total =  $request->jumlah + $data['jumlahSimpanan'];

        $save = new Penarikan;
        $save->simpanan_id = $request->simpanan_id;
        $save->tanggal = $request->tanggal;  
        $save->jumlah = $request->jumlah;  
        $save->save(); 
        return redirect()->back()->with('Success', 'Ditambahkan');
    }
    public function show($id)
    {

        $simpanan = Simpanan::find($id);
        $data = Penarikan::where('simpanan_id', $id)->get();
        $total = 0;
        return view('admin.penarikan.show', compact('data', 'simpanan', 'total'));
    }

    
}
