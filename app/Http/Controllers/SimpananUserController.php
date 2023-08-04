<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Simpanan;
use App\Models\Anggota;
use App\Models\JenisSimpanan;

class SimpananUserController extends Controller
{
    public function index(Request $request){

        $user = auth()->id();
       
        // $anggota = Anggota::where('users_id', $user)->get();
        // $jenis = JenisSimpanan::where('id', $id)->get();
        $data = Simpanan::where('users_id', $user)->get();
        
        return view('user.dataSimpanan.index', compact('user', 'data'));
    }
    
    // public function show(Request $request)
    // {
        

    //     // $jenis = JenisSimpanan::all();
    //     // $anggota = Anggota::all();
        
    //     // $data = Anggota::where('users_id', $user)->get();

    //     return view('user.dataSimpanan.show', compact('user', 'data'
    //     , 'anggota', 'jenis'
    // ));
    // }
}
