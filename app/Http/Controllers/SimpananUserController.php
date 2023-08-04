<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Simpanan;
use App\Models\Anggota;
use App\Models\JenisSimpanan;
use App\Models\DetailSimpanan;
use App\Models\Penarikan;

class SimpananUserController extends Controller
{
    public function show($id){

       
       
        $user = auth()->id();
        $simpanan = Simpanan::where('users_id', $user)->get();
        $detsimp = DetailSimpanan::where('simpanan_id', $id)->orderBy('id', 'desc')->get();
        // dd($detsimp);
        $total = 0;
        
        return view('user.dataSimpanan.show', compact('user', 'simpanan', 'detsimp', 'total'));
    }

    public function index()
    {
        $user = auth()->id();
        $simpanan = Simpanan::where('users_id', $user)->get();

        $total = 0;
        return view('user.dataSimpanan.index', compact('user', 'simpanan', 'total'));
    }

    
}
