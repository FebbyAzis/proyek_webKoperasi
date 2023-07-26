<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SimpananAnggota;
use Auth;

class SimpananAnggotaController extends Controller
{
    public function index()
    {
        // $data['user'] = Auth::user();
        $data = SimpananAnggota::all();
        // dd($cek->users->name);
        return view('admin.simpanananggota.simpanananggota', compact(['data']));
    }

    public function show($id)
    {
        // $id = User::where('id', $id)->first();
        // $simpanans['simpanananggota'] = SimpananAnggota::where('user_id', $id->id)->get();
        // // dd($simpanans['simpanananggota']);
        // return view('admin.simpanananggota.simpanananggota');
    }

    // public function jenis()
    // {
    //     return view
    // }
}
