<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simpanan;
use App\Models\Penarikan;
use Auth;

class PenarikanUserController extends Controller
{
    public function show($id)
    {
        $user = auth()->id();
        $simpanan = Simpanan::where('users_id', $user)->get();
        $pen = Penarikan::where('simpanan_id', $id)->orderBy('id', 'desc')->get();
        $total = 0;

        return view('user.dataPenarikan.show', compact('user', 'simpanan', 'pen', 'total'));
    }
}