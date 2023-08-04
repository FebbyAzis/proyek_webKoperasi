<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailPinjamanController extends Controller
{
    public function show($id)
    {

        $pinjaman = Pinjaman::find($id);
        $data = DetailPinjaman::where('pinjaman_id', $id)->get();
        $total = 0;
        return view('admin.detailPinjaman.show', compact('data', 'pinjaman', 'total'));
    }
}
