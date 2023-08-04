<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\SHUAnggota;

class SHUUserController extends Controller
{
    public function index(Request $request){

        $user = auth()->id();
       
        // $anggota = Anggota::where('users_id', $user)->get();
        // $jenis = JenisSimpanan::where('id', $id)->get();
        $data = SHUAnggota::where('users_id', $user)->get();
        
        return view('user.dataSHU.index', compact('user', 'data'));
    }
}
