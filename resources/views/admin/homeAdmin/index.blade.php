
@extends('admin.layout.app')
@section('content')
<title>Anggota</title>

<div class="main-panel">
    <div class="content">
        <div class="panel-header">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-secondary">
                            <div class="card-body skew-shadow">
                                @foreach ($simpanan as $item)
                                @php
                                    $total += $item['jumlahSimpanan'];
                                @endphp
                                @endforeach
                                <h1>Rp. {{ number_format($total, 0, ',', '.') }}</h1>
                                <h5 class="op-8">Total Simpanan</h5> 
                               
                             
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-dark bg-secondary-gradient">
                            <div class="card-body bubble-shadow">
                                @foreach ($pinjaman as $item)
                                @php
                                    $totals += $item['jumlahPinjaman'];
                                @endphp
                                @endforeach
                                <h1>Rp. {{ number_format($totals, 0, ',', '.') }}</h1>
                                <h5 class="op-8">Total Pinjaman</h5>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-dark bg-secondary2">
                            <div class="card-body curves-shadow">
                              
                                <h1>{{$anggota}}</h1>
                                <h5 class="op-8">Anggota</h5>
                               
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3" align="center">
                    <img src="{{ asset('Assets/images/logo_koperasi.png') }}" width="450" class="bg-secondary-gradient" align="center">
                </div>
                
        </div>

    </div>

{{-- <div class="main-panel">
    
    <div class="content">
   
        <div class="row m-3">
            <div class="col-md-4">
                <div class="card card-secondary">
                    <div class="card-body skew-shadow">
                       <h1>Rp. 324.500.000</h1>
                        <h5 class="op-8">Total Simpanan</h5> 
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dark bg-secondary-gradient">
                    <div class="card-body bubble-shadow">
                        <h1>Rp. 45.000.000</h1>
                        <h5 class="op-8">Total Pinjaman</h5>
                       
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dark bg-secondary2">
                    <div class="card-body curves-shadow">
                        <h1>2</h1>
                        <h5 class="op-8">Anggota</h5>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}



@endsection