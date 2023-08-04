<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\JasaAnggota;

class JasaUserController extends Controller
{
    public function index(Request $request){

        $user = auth()->id();
       
        // $anggota = Anggota::where('users_id', $user)->get();
        // $jenis = JenisSimpanan::where('id', $id)->get();
        $data = JasaAnggota::where('users_id', $user)->get();
        
        return view('user.dataJasa.index', compact('user', 'data'));
    }
}
