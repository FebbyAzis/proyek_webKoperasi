@extends('user.layout.app')
@section('content')
<title>Show Data Anggota</title>

<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Data Anggota<h2>
                        <h5 class="text-white op-7 mb-2">KOPERASI TUTWURI HANDAYANI</h5>
                    </div>
                    
                    {{-- <button class="btn btn-secondary btn-round ml-auto" data-toggle="tooltip" data-target="">
                        <a href="{{ route('anggota.index') }}" class="text-light"> 
                        <i class="fa fa-angle-left"></i>
                        Kembali
                    </a>
                    </button> --}}
                    
                </div>
            </div>
        </div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Detail Data Anggota</h4>
                {{-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-eye"></i>
                     Lihat Data Anggota
                </button> --}}
            </div>
        </div>
        <div class="card-body">
            @foreach($data as $d)
            @csrf
            {{-- <div class="form-group">
                <label class="control-label">
                    Alamat
                </label> 
                <p class="form-control-static">{{ $data->users_id }}</p> 
            </div> --}}
            <div class="form-group">
                <label class="control-label">
                    No Anggota
                </label> 
                <p class="form-control-static">{{ $d->noAnggota }}</p> 
            </div>
            <div class="form-group">
                <label class="control-label">
                    No Identitas
                </label> 
                <p class="form-control-static">{{ $d->noIdentitas }}</p> 
            </div>
            <div class="form-group">
                <label class="control-label">
                    Nama Anggota
                </label> 
                <p class="form-control-static">{{ $d->users->name }}</p> 
            </div>
            
            <div class="form-group">
                <label class="control-label">
                    Jenis Kelamin
                </label> 
                <p class="form-control-static">@if ($d->jKelamin === "L")
                    Laki Laki
                @elseif ($d->jKelamin === "P")
                    Perempuan
                @endif</p> 
            </div>
            <div class="form-group">
                <label class="control-label">
                    Tempat Lahir
                </label> 
                <p class="form-control-static">{{ $d->tempatLahir }}</p> 
            </div>
            <div class="form-group">
                <label class="control-label">
                    Tanggal Lahir
                </label> 
                <p class="form-control-static">{{ $d->tglLahir }}</p> 
            </div>
            <div class="form-group">
                <label class="control-label">
                    Email
                </label> 
                <p class="form-control-static">{{ $d->users->email }}</p> 
            </div>
            <div class="form-group">
                <label class="control-label">
                    No Telepon
                </label> 
                <p class="form-control-static">{{ $d->noTelpon }}</p> 
            </div>
            <div class="form-group">
                <label class="control-label">
                    Alamat
                </label> 
                <p class="form-control-static">{{ $d->alamat }}</p> 
            </div>
            
            
            
        @endforeach    
        </div>



@endsection