@extends('user.layout.app')
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
                    {{-- <div class="col-6"></div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="col-sm-2" style="text-align: end">
                    <a href="{{ route('penarikan.show', $simpanan->id) }}">
                    <button class="btn btn-secondary btn-round ml-auto">
                        <i class="fas fa-money-bill"></i>
                             &nbsp; Lihat Data Penarikan
                        </button></a>
                    </div> --}}
                </div>
            </div>
        </div>
       
<div class="col-md-12">
    <div class="card">
        <div class="card-header mt-3">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Info Simpanan Anggota</h4>
                <div class="col-md-4"></div>
               
                {{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                    <div class="col-sm-5" style="text-align: end">
                        @foreach ($simpanan as $s)
                        <a href="{{ route('dataPenarikan.show', $s->id) }}"> 
                        @endforeach
                        
                        <button class="btn btn-secondary btn-round ml-auto">
                            <i class="fas fa-money-bill"></i>
                                 &nbsp; Lihat Data Penarikan
                            </button></a>
                        </div>
            </div>
        </div>
        @foreach ($simpanan as $s)
        @csrf
        <div class="card-body">
            <!-- Modal -->
          
           
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                     <tbody>
                        
                      <tr>
                        <th scope="row">Nama Anggota</th>
                        <td>:</td>
                        <td>{{$s->users->name}}</td>
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
                        <td>{{$s->jenisSimpanan->namaSimpanan}}</td>
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
                        <th>Rp. {{ number_format($s['jumlahSimpanan'], 0, ',', '.') }}</th>
                        
                      </tr>
                      
                    </tbody>
                  </table>
            </div>
        </div>
       
        </div>
        @endforeach
<br>
<div class="card-header">
    <div class="d-flex align-items-center">
        <h4 class="card-title">Detail Data Simpanan</h4>
        {{-- <button class="btn btn-secondary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
        <i class="fa fa-plus"></i>
            Tambah Data Simpanan
        </button>
    </div> --}}
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
                        @foreach ($detsimp as $no => $item)
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
      






        @endsection