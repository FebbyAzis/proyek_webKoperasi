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
                <div class="col-4"></div>
                <div class="col-sm-2" style="text-align: end">
                    @foreach ($simpanan as $s)  
                    <a href="{{ route('dataSimpanan.show', $s->id) }}">
                        @endforeach
                    <button class="btn btn-secondary btn-round ml-auto">
                        <i class="fas fa-wallet"></i>
                             &nbsp; Lihat Data Simpanan
                        </button></a>
                    </div>
                    
                    <div class="col-sm-2 ml-5" style="text-align: end">
                        @foreach ($simpanan as $s) 
                        <a href="{{ route('penarikan.show', $s->id) }}">
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
        {{-- @endforeach --}}
        </div>
        @endforeach
    </div>
</div>


 
      






@endsection