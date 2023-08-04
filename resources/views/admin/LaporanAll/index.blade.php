@extends('admin.layout.app')
@section('content')
<title>Anggota</title>

<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Data Seluruh Laporan</h2>
                        <h5 class="text-white op-7 mb-2">KOPERASI TUTWURI HANDAYANI</h5>
                    </div>
                    
                </div>
            </div>
        </div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Tabel Data Laporan</h4>
           
            </div>
        </div>
 
  
            <div class="table-responsive">
               
                <table id="add-row" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            
                            <th rowspan="2">Nama Anggota</th>
                            <th colspan="3" class="text-center">Simpanan</th>
                            <th colspan="3">Sisa Simpanan</th>
                            <th colspan="3">Jasa Anggota</th> 
                            <th colspan="3">SHU Anggota</th>                      
                        </tr>
                        <tr>
                            <th>Pokok</th>
                            <th>Wajib</th>
                            <th>Manasuka</th>
                            <th>Piutang</th>
                            <th>Smtr/p3</th>
                            <th>Reguler</th>
                            <th style="text-align: center">Hutang Barang</th>
                            <th>Hutang Uang</th>
                            <th>Total</th>
                            <th>Simpanan</th>
                            <th>Hutang</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($user  as $data)
                        <tr>
                            <td>{{ $data->simp->jumlahSimpanan }}</td>
                            <td></td>
                            <!-- Tampilkan kolom lain sesuai dengan struktur tabel -->
                        </tr>
                        @endforeach
                       
                        

                    </tbody>
                   
                </table>
            </div>
        </div>
    </div>


@endsection