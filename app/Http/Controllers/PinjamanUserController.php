<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Pinjaman;
use App\Models\Angsuran;

class PinjamanUserController extends Controller
{
    public function index(Request $request){

        $user = auth()->id();
       
        // $anggota = Anggota::where('users_id', $user)->get();
        // $jenis = JenisSimpanan::where('id', $id)->get();
        $data = Pinjaman::where('users_id', $user)->get();
        
        return view('user.dataPinjaman.index', compact('user', 'data'));
    }

    public function show($id)
    {

        $user = auth()->id();
        $data = Pinjaman::where('users_id', $user)->get();
        $angsuran = Angsuran::where('pinjaman_id', $id)->orderBy('id', 'desc')->get();
        // dd($angsuran);
        $total = 0;
        $bungas = 2500;
        // dd($angsuran);

        // if($angsuran->bungaAngsuran == 5){

        // }else{

        // }

      return view('user.dataPinjaman.show', compact('data', 'angsuran', 'total', 'bungas'));
    }
}
