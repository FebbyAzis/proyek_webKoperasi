@extends('user.layout.app')
@section('content')
    <title>Show Data Pinjaman Anggota</title>

    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Detail Pinjaman Anggota</h2>
                            <h5 class="text-white op-7 mb-2">KOPERASI TUTWURI HANDAYANI</h5>
                        </div>

                    </div>
                </div>
            </div>
            @foreach ($data as $data)
            @csrf
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Detail Data Pinjaman Anggota</h4>
                            {{-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-eye"></i>
                     Lihat Data Anggota
                </button> --}}
                        </div>
                    </div>
                    <div class="card-body ml-3">
                        
                        
                        
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table">
                                   
                                    <tbody>
                                      <tr>
                                        <th scope="row">Nama Anggota</th>
                                        <td>:</td>
                                        <td>{{$data->users->name}}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Tanggal Pinjaman</th>
                                        <td>:</td>
                                        <td>{{date("d/M/Y", strtotime($data->tanggal));}}</td>
                                       
                                      </tr>
                                      <tr>
                                        <th scope="row">Jenis Pinjaman</th>
                                        <td>:</td>
                                        <td>{{$data->jenisPinjaman->namaPinjaman}}</td>
                                       
                                      </tr>
                                     
                                    </tbody>
                                  </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table">
                                   
                                    <tbody>
                                      <tr>
                                        <th scope="row">Jumlah Pinjaman</th>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($data['jumlahPinjaman'], 0, ',', '.') }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Bunga</th>
                                        <td>:</td>
                                        @php
                                            $bungareq = ($data->jumlahPinjaman * $data->bunga) / 100;
                                        @endphp
                                        <td>Rp. {{ number_format($bungareq, 0, ',', '.') }}</td>
                                       
                                      </tr>
                                      <tr>
                                        <th scope="row">Total Pinjaman</th>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($data->jumlahPinjaman + $bungareq, 0, ',', '.') }}</td>
                                       
                                      </tr>
                                      <tr>
                                        <th scope="row">Nominal Angsuran</th>
                                        <td>:</td>
                                        <td>Rp. {{ number_format(($data->jumlahPinjaman + $bungareq)/$data->lama, 0, ',', '.') }} / {{$data->lama}} Bulan</td>
                                       
                                      </tr>
                                     
                                    </tbody>
                                  </table>
                            </div>
                        </div>





                    </div>
                </div>
                @endforeach
            </div>

            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Detail Data Angsuran Pinjaman</h4>
                           
                
                        </div>
                    </div>
                    <div class="card-body ml-3">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal Angsuran</th>
                                        <th>Cicilan</th>
                                        <th>Angsuran</th>
                                  
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($angsuran as $no => $d)
                                    <tr>
                                        <td>{{date("d/M/Y", strtotime($d->tglAngsuran));}}</td>
                                        <td>Tahap {{ $no + 1 }}</td>
                                        {{-- @php
                                            $angs = ($d->jumlahPinjaman + $bungareq)/$data->lama;
                                        @endphp --}}
                                        <td>Rp. {{ number_format(($data->jumlahPinjaman + $bungareq)/$data->lama, 0, ',', '.') }}</td>
                                        @php
                                            $bungaAng = ($bungas * $d->bungaAngsuran);
                                        @endphp
                                     
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            </div>
                        
                        
                        
                       
            
        @endsection
