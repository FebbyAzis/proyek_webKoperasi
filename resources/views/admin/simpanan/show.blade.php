@extends('admin.layout.app')
@section('content')
<title>Anggota</title>

<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Detail Simpanan Anggota</h2>
                        <h5 class="text-white op-7 mb-2">KOPERASI TUTWURI HANDAYANI</h5>
                    </div>
                    
                </div>
            </div>
        </div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Tabel Simpanan Anggota {{$data->users->name}}</h4>
                {{-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-eye"></i>
                     Lihat Data Anggota
                </button> --}}
            </div>
        </div>
        <div class="card-body">
            <!-- Modal -->
            <form action="{{ route('penarikan.store') }}" method="POST">
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
                                    Simpanan Anggota
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Lengkapi data dibawah ini untuk menambahkan simpanan anggota baru!</p>
                            <div class="col-sm-12 mt-1">
                          
                          </div>
                            <form>
                                <div class="row">

                                    <div class="col-sm-12 mt-1">
                                        <div class="form-group form-group-default">
                                            <label>Tanggal</label>
                                            <input id="addName" type="date" class="form-control" placeholder="" name="tanggal">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mt-1">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Pilih User</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="simpanan_id">
                                           
                                                <option value="{{ $data->id }}">{{$data->users->name}} - {{$data->jenisSimpanan->namaSimpanan}}
                                                     - {{$data->jumlah}}
                                               
                                               
                                             
                                             </select>
                                          </div>
                                    </div>

                                    {{-- <div class="col-sm-12 mt-1">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Pilih Jenis Simpanan</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="jenissimpanan_id">
                                              @foreach ($jenis as $jen)
                                                <option value="{{ $jen->id }}">{{ $jen->namaSimpanan }}
                                               
                                                </option>
                      
                                               @endforeach
                                             </select>
                                          </div>
                                    </div> --}}
                                    
                                    <div class="col-sm-12 mt-1">
                                        <div class="form-group form-group-default">
                                            <label>Jumlah Penarikan</label>
                                            <input id="addName" type="text" class="form-control" placeholder="jumlah penarikan" name="jumlahPenarikan">
                                        </div>
                                    </div>
                                
                                    
                                    
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



        <div class="row">
            <div class="col-md-6">
                <table class="table">
                   
                    <tbody>
                      
                      <tr>
                        <th scope="row">Jenis Simpanan</th>
                        <td>:</td>
                        <td>{{$data->jenisSimpanan->namaSimpanan}}</td>
                       
                      </tr>
                     
                    </tbody>
                  </table>
            </div>
            <div class="col-md-6">
                <table class="table">
                    
                  
                  
                    <tbody>
                        
                      <tr>
                        <th scope="row">Jumlah Simpanan</th>
                        <td>:</td>
                        <td>Rp. {{ number_format($data['jumlah'], 0, ',', '.') }}</td>
                      </tr>
                      
                    </tbody>
                  </table>
            </div>
        </div>
      


  <br>
<div class="card-header">
    <div class="d-flex align-items-center">
        <h4 class="card-title">Detail Data Penarikan</h4>
        <button class="btn btn-secondary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
        <i class="fa fa-plus"></i>
            Buat Penarikan 
        </button>
    </div>
    <br>
</div>
            <div class="table-responsive">
              
                <table id="add-row" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Anggota</th>
                            <th>Jenis Simpanan</th>
                            <th>Jumlah Simpanan</th>      
                            <th>Jumlah Penarikan</th>               
                            {{-- <th>Sisa Simpanan</th> --}}
                        </tr>
                    </thead>
                    
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($penarikan as $item)
                        @php
                            $total = $total + $item['jumlahPenarikan'];
                        @endphp
                        <tr>
                            <td>{{date("d/M/Y", strtotime($item->tanggal));}}</td>
                            <td>{{$data->users->name}}</td>
                            <td>{{$data->jenisSimpanan->namaSimpanan}}</td>
                            <td>Rp. {{ number_format($data['jumlah'], 0, ',', '.') }}</td>      
                            <td>Rp. {{ number_format($item['jumlahPenarikan'], 0, ',', '.') }}</td>                 
                            {{-- <td>Rp. {{ number_format($data->jumlah - $item->jumlahPenarikan, 0, ',', '.') }}</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                  
                </table>
                
            </div>
        </div>
    </div>
</div>


{{-- @foreach($data as $no => $p)
                
                <form action="{{ route('penarikan.update', $p->id)}}" method="post">
        @csrf
        @method('PUT')     
<div class="modal fade" id="addRowModal{{ $p->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        <h3>Edit</span> 
                    <span class="fw-light">
                        Simpanan </h3>
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="small">Ubah data dibawah ini untuk mengedit simpanan anggota!</p>
                <form>
                    <div class="row">

                        <div class="col-sm-12 mt-1">
                            <div class="form-group form-group-default">
                                <label>Tanggal</label>
                                <input id="addName" type="date" class="form-control" placeholder="" name="tanggal" value="{{$p->tanggal}}">
                            </div>
                        </div>
                        
                        <div class="col-sm-12 mt-1">
                            <div class="form-group form-group-default">
                                <label>Jumlah</label>
                                <input id="addName" type="text" class="form-control" placeholder="jumlah" name="jumlah" value="{{ $p->jumlah }}">
                            </div>
                        </div>

            
                    </div>
                </form>
            </div>
            <div class="modal-footer no-bd">
                <button type="submit" id="addRowButton" class="btn btn-primary">Edit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</form>
@endforeach --}}
@endsection