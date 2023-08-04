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
                    <div class="col-lg-9" style="text-align: end">
                    <a href="{{ route('penarikan.show', $simpanan->id) }}">
                    <button class="btn btn-secondary btn-round ml-auto">
                        <i class="fas fa-money-bill"></i>
                             &nbsp; Lihat Data Penarikan
                        </button></a>
                    </div>
                </div>
            </div>
        </div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header mt-3">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Info Simpanan Anggota</h4>
                {{-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-eye"></i>
                     Lihat Data Anggota
                </button> --}}
                <td class="text-right"><button class="btn btn-md bg-secondary text-white btn-round ml-auto" data-toggle="modal" title=""  data-original-title="Edit Task" data-target="#addRowModal{{ $simpanan->id }}">
                    <i class="fas fa-retweet"></i>
                        Update
                    </button></td>
            </div>
        </div>
        <div class="card-body">
            <!-- Modal -->

        <div class="row">
            <div class="col-md-6">
                <table class="table">
                     <tbody>
                        
                      <tr>
                        <th scope="row">Nama Anggota</th>
                        <td>:</td>
                        <td>{{$simpanan->users->name}}</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <tbody>
                      <tr>
                        <th scope="row">Jenis Simpanan</th>
                        <td>:</td>
                        <td>{{$simpanan->jenisSimpanan->namaSimpanan}}</td>
                      </tr>
                      
                    </tbody>
                  </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tbody>
                      <tr>
                        
                        
                      </tr>
                      
                    </tbody>
                  </table>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <tbody>
                      <tr>
                        <th scope="row">Jumlah Simpanan</th>
                        <th>:</th>
                        <th>Rp. {{ number_format($simpanan['jumlahSimpanan'], 0, ',', '.') }}</th>
                        
                      </tr>
                      
                    </tbody>
                  </table>
            </div>
        </div>
        </div>
    <br>
    <div class="card-header">
        <div class="d-flex align-items-center">
            <h4 class="card-title">Detail Data Simpanan</h4>
            <button class="btn btn-secondary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
            <i class="fa fa-plus"></i>
                Tambah Data Simpanan
            </button>
        </div>
        <br>
    </div>
                <div class="table-responsive">
                  
                    <table id="add-row" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Simpanan</th>               
                                {{-- <th>Sisa Simpanan</th> --}}
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($data as $no => $item)
                                @php
                                    $total += $item['jumlah'];
                                @endphp
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{date("d/M/Y", strtotime($item->tanggal));}}</td>  
                                <td>Rp. {{ number_format($item['jumlah'], 0, ',', '.') }}</td>                 
                                {{-- <td>Rp. {{ number_format($item->jumlah - $item->jumlahPenarikan, 0, ',', '.') }}</td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-right" colspan="2"> Total </th>
                                <th>Rp. {{ number_format($total, 0, ',', '.') }}</th>
                            </tr>
                        </tfoot>
                       
                    </table>
                    
                </div>
</div></div>
      






        <form action="{{ route('detailSimpanan.store') }}" method="POST">
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
                            <div class="row">
                                {{-- <input type="hidden" name="id" value="{{ $simpanan->id }}"> --}}

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
                                       
                                            <option value="{{ $simpanan->id }}">{{$simpanan->users->name}} - {{$simpanan->jenisSimpanan->namaSimpanan}}
                                                 
                                            </option>
                                           
                                         
                                         </select>
                                      </div>
                                </div>

                                <div class="col-sm-12 mt-1">
                                    <div class="form-group form-group-default">
                                        <label>Jumlah Simpanan</label>
                                        <input id="addName" type="text" class="form-control" placeholder="Masukan Nominal Simpanan" name="jumlah">
                                    </div>
                                </div>
                                </form>
                               
                            
                                
                                
                               
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

    

                @foreach ($data as $i)
                {{-- @php
                $total += $i['jumlah'];
            @endphp --}}
                <form action="{{ route('simpanan.update', $simpanan->id)}}" method="post">
        @csrf
        @method('PUT')     
<div class="modal fade" id="addRowModal{{ $simpanan->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        <h3>Edit</span> 
                    <span class="fw-light">
                        Simpanan {{$simpanan->users->name}}</h3>
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

                        <input type="hidden" name="id" value="{{ $i->id }}">
                        <div class="col-sm-12 mt-1">
                            <label>Jumlah simpanan saat ini : <b>Rp. {{ number_format($simpanan->jumlahSimpanan, 0, ',', '.') }}</b></label>
                        </div>
                        
                        <div class="col-sm-12 mt-3">
                            <div class="form-group form-group-default">
                                <label>Jumlah simpanan setelah update</label>
                               
                                <input id="addName" type="text" class="form-control" placeholder="jumlah" name="jumlahSimpanan" value="{{$total}}"><b>Rp. {{ number_format($total, 0, ',', '.') }}</b>
                            </div>
                        </div>

            
                    </div>
                </form>
            </div>
            <div class="modal-footer no-bd">
                <button type="submit" id="addRowButton" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</form>
                    
                @endforeach


@endsection