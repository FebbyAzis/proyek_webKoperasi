<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Auth;

class AnggotaUserController extends Controller
{
    public function index(Request $request)
    {
        // $data = Anggota::finOrFail($id);
        $user = auth()->id();
        $data = Anggota::where('users_id', $user)->get();
        return view('user.dataAnggota.index', compact('user', 'data'));
    }
}

