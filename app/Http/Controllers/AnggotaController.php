<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Users;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        // $data = Users::where('id', $id)->get;
        $data = Anggota::all();
        $users = Users::all();
        // @dd('$users');
        // dd($anggotas);
        return view('admin.anggota.index', compact(['data', 'users']))->with('i', (request()->input('page',1) -1) *10);;
    }

    public function store(Request $request)
    {
        
        // $request->validate([
        //     'naoanggota' => 'required',
        //     'namaanggota' => 'required',
        //     'angsuranpokok' => 'required',
        //     'jasa' => 'required',
        //     'simpananke' => 'required',
        //     'simpananwajib' => 'required',
        //     'simpananpokok' => 'required',
        //     'simpananmasukan' => 'required',
        //     'angsuranpihakke3pokok' => 'required',
        //     'angsuranpihakke3jasa' => 'required',
        //     'angsuranpihakke3jumlah' => 'required',
        //     'angsuranpihakke3ke' => 'required',
        //     'angsuranpihakke3ke' => 'required',
        //     'baranglainjumlah' => 'required',
        //     'baranglainke' => 'required',
        // ]);



        $save = new Anggota;
        $save->users_id = $request->users_id; 
        $save->noAnggota = $request->noAnggota;
        $save->noIdentitas =  $request->noIdentitas;
        // $save->namaAnggota =  $request->namaAnggota;
        $save->jKelamin =  $request->jKelamin;
        $save->tempatLahir =  $request->tempatLahir;
        $save->tglLahir =  $request->tglLahir;
        $save->noTelpon =  $request->noTelpon;
        $save->alamat =  $request->alamat;
        $save->save(); 
        return redirect()->back()->with('Success', 'Ditambahkan');
    }

    public function update(Request $request, $id)
    {
    
        Anggota::where('id', $id)->update([
            'noAnggota' => $request->noAnggota,
            'noIdentitas' => $request->noIdentitas,
            // 'namaAnggota' => $request->namaAnggota,
            'jKelamin' => $request->jKelamin,
            'tempatLahir' => $request->tempatLahir,
            'tglLahir' => $request->tglLahir,
            'noTelpon' => $request->noTelpon,
            'alamat' => $request->alamat,
        ]);

        return redirect()->back()->with('Success', 'Data Anggota Berhasil Diedit');
    }

    public function destroy($id)
    {
        Anggota::where('id', $id)->delete();
        return redirect()->back();
    }

    

    public function show($id)
    {

        $data['data'] = Anggota::find($id);
        // dd($data);
        return view('admin.anggota.show', $data);
    }

    // public function anggotass(request $request)
    // {
    //     $anggotass = Anggota::find(id);
    //     $users = Users::all();

    //     return view('admin.anggota.show', compact('anggotass', 'users'));
    // }
}
