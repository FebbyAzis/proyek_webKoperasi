@extends('admin.layout.app')
@section('content')
<title>Laporan Simpanan</title>

<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Data Laporan Jasa Anggota</h2>
                        <h5 class="text-white op-7 mb-2">KOPERASI TUTWURI HANDAYANI</h5>
                    </div>
                    
                </div>
            </div>
        </div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Form Data Laporan Jasa Anggota</h4>
            </div>
        </div>
        <div class="row">         
                <div class="card-body">
                    <div class="col-md-12">
                        <h4 class="ml-2">Buat laporan simpanan anggota berdasarkan tanggal :</h4>
                        <div class="form-group m-2">
                            <label for="email2">Tanggal Awal</label>
                            <input type="date" class="form-control" id="tglawal" placeholder="masukan tanggal awal" name="tglawal">
                        </div>
                        <div class="form-group m-2">
                            <label for="email2">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tglakhir" placeholder="masukan tanggal akhir" name="tglakhir">
                        </div>
                       <div class="row text-end" align="center"><div class="col-md-8"></div>
                       <div class="col-md-4 mb-3 mt-2">
                        <a href="" onclick="this.href='/cetak-jasaAnggota/'+document.getElementById('tglawal').value+'/'+document.getElementById('tglakhir').value" target="_blank">
                           
                           <button class="btn btn-secondary btn-round ml-auto">
                            <i class="fas fa-print"></i>
                                 &nbsp; Cetak Laporan Jasa Anggota
                            </button>
                        </a>
                       </div></div>
                        
                        
                    </div>
                </div>
        </div>

    <hr>
    <div class="card-header">
        <div class="d-flex align-items-center mb-3">
            <h4 class="card-title">Data Tabel Laporan Jasa Anggota</h4>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-md-2"></div>
            <div class="col-sm-6" style="text-align: end">
                
                </div>
        </div>
    </div>    
    <form method="GET" action="/laporan-jasaAnggota-pertanggal">
        <div class="row" align="center">
            <div class="col-md-4">
                <div class="form-group m-2">
                    <input type="date" class="form-control" id="start_date" placeholder="masukan tanggal awal" name="start_date">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group m-2">
                    <input type="date" class="form-control" id="end_date" placeholder="masukan tanggal akhir" name="end_date">
                </div>
            </div>
            <div class="col-md-4 mt-3">
                    <button class="btn btn-secondary btn-sm btn-round ml-auto m-2" type="submit">
                        <i class="fas fa-search"></i>
                             &nbsp; Cari Jasa Anggota Berdasarkan Tanggal
                        </button>
                
            </div>
        </div>
    </form>    
    <div class="table-responsive">
               
                <table id="add-row" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Anggota</th>
                           
                            <th>Hutang Barang</th>
                            <th>Hutang Uang</th>
                                  
                        </tr>
                       
                    </thead>
                    
                    <tbody>
                        @foreach ($jasa as $no=>$item)
                        <tr>
                            <td> {{ $no+1 }} </td>
                            <td> {{date("d/M/Y", strtotime($item->created_at));}} </td>
                            <td> {{ $item->users->name }} </td>
                            <td>Rp. {{ number_format($item['hutangBarang'] ,0,',','.') }}</td>
                            <td>Rp. {{ number_format($item['hutangUang'] ,0,',','.') }}</td>
                        </tr>
                        @endforeach
                        

                    </tbody>
                   
                </table>
            </div>
        </div>
    </div>


@endsection