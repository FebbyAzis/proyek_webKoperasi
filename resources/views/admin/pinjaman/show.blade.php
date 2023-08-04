@extends('admin.layout.app')
@section('content')
    <title>Show Data Pinjaman Anggota</title>

    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Pinjaman Anggota</h2>
                            <h5 class="text-white op-7 mb-2">KOPERASI TUTWURI HANDAYANI</h5>
                        </div>

                    </div>
                </div>
            </div>

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
                                        <td>Rp. {{ number_format(($data->jumlahPinjaman * $data->bunga) / 100, 0, ',', '.') }}</td>
                                       
                                      </tr>
                                      <tr>
                                        <th scope="row">Nominal Angsuran</th>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($data->jumlahPinjaman / $data->lama, 0, ',', '.') }}</td>
                                       
                                      </tr>
                                      <tr>
                                        <th scope="row">Total Angsuran</th>
                                        <td>:</td>
                                        <td>Rp. {{ number_format(($data->jumlahPinjaman/$data->lama)+ $bungareq, 0, ',', '.') }} / {{$data->lama}} Bulan</td>
                                       
                                      </tr>
                                     
                                    </tbody>
                                  </table>
                            </div>
                        </div>





                    </div>
                </div>
            </div>

            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Detail Data Angsuran</h4>
                            {{-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-eye"></i>
                     Lihat Data Anggota
                </button> --}}
                <button class="btn btn-secondary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                        Buat Angsuran
                    </button>
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
                                  
                                        {{-- <th>Bunga</th> --}}
                                        {{-- <th>Jumlah Bayar</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($angsuran as $no => $d)
                                    <tr>
                                        <td>{{date("d/M/Y", strtotime($d->tglAngsuran));}}</td>
                                        <td>Tahap {{ $no + 1 }}</td>
                                        @php
                                            $angs = ($data->jumlahPinjaman + $bungareq)/$data->lama;
                                        @endphp
                                        <td>{{ number_format(($data->jumlahPinjaman/$data->lama)+ $bungareq, 0, ',', '.') }}</td>
                                        @php
                                            $bungaAng = ($bungas * $d->bungaAngsuran);
                                        @endphp
                                        {{-- <td>{{ number_format(($bungareq / $data->lama)+$bungaAng, 0, ',', '.') }}</td>
                                        <td>{{ number_format(($bungareq / $data->lama)-$bungaAng+$angs, 0, ',', '.') }}</td> --}}
                                        
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
                        
                        
                        
                       
            <div class="card-body">
                <!-- Modal -->
                <form action="{{ route('angsuran.store') }}" method="POST">
                    @csrf
                    @method('POST') 
                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                    Tambah</span> 
                                    <span class="fw-light">
                                        Angsuran Anggota
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="small">Lengkapi data dibawah ini untuk menambahkan angsuran anggota baru!</p>
                                <div class="col-sm-12 mt-1">
                              
                              </div>
                                <form>
                                    <div class="row">
    
                                        <div class="col-sm-12 mt-1">
                                            <div class="form-group form-group-default">
                                                <label>Tanggal</label>
                                                <input id="addName" type="date" class="form-control" placeholder="" name="tglAngsuran">
                                            </div>
                                        </div>
    
                                        <div class="col-sm-12 mt-1">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Pilih User</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="pinjaman_id">
                                               
                                                    <option value="{{ $data->id }}">{{$data->users->name}} - {{$data->jenisPinjaman->namaPinjaman}}
                                                         - {{ number_format($data->jumlahPinjaman, 0, ',', '.') }}
                                                   
                                                   
                                                 
                                                 </select>
                                              </div>
                                        </div>
    
                                        {{-- <div class="col-sm-12 mt-1">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Telat Bayar</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="bungaAngsuran">
                                                  
                                                    <option value="1">Tidak Ada</option>
                                                    <option value="2">1 Hari</option>
                                                    <option value="3">2 Hari</option>
                                                    <option value="4">3 Hari</option>
                                                    <option value="5">4 Hari</option>
                                                    <option value="6">5 Hari</option>
                                                    <option value="7">6 Hari</option>
                                                    <option value="8">7 Hari</option>
                                                    <option value="9">8 Hari</option>
                                                    <option value="10">9 Hari</option>
                                                    <option value="11">10 Hari</option>
                                                    <option value="12">11 Hari</option>
                                                    <option value="13">12 Hari</option>
                                                    <option value="14">13 Hari</option>
                                                    <option value="15">14 Hari</option>
                                                    <option value="16">15 Hari</option>
                                                    <option value="17">16 Hari</option>
                                                    <option value="18">17 Hari</option>
                                                    <option value="19">18 Hari</option>
                                                    <option value="20">19 Hari</option>
                                                    <option value="21">20 Hari</option>
                                                    <option value="22">21 Hari</option>
                                                    <option value="23">22 Hari</option>
                                                    <option value="24">23 Hari</option>
                                                    <option value="25">24 Hari</option>
                                                    <option value="26">25 Hari</option>
                                                    <option value="27">26 Hari</option>
                                                    <option value="28">27 Hari</option>
                                                    <option value="29">28 Hari</option>
                                                    <option value="30">29 Hari</option>
                                                    <option value="31">30 Hari</option>
                                                    <option value="32">31 Hari</option>
                                                    <option value="33">32 Hari</option>
                                                 </select>
                                              </div>
                                        </div> --}}
                                        
                                       
                                    
                                        
                                        
                                        {{-- <div class="col-sm-12 mt-1">
                                            <div class="form-group form-group-default">
                                                <label>Password</label>
                                                <input id="addName" type="text" class="form-control" placeholder="password" name="password">
                                            </div>
                                        </div> --}}
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer no-bd">
                                <button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        
        @endsection
