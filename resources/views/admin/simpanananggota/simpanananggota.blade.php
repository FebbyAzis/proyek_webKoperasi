{{-- @php
    use App\Models\SimpananAnggota;
@endphp --}}

@extends('admin.layout.app')
@section('content')
  
<div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Data Anggota</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        {{-- @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <a class="btn bg-gradient-primary mt-3 m-4 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus p-1"></i> Tambah Data</a>
        <div class="table-responsive p-0">
            
            <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th rowspan="2" class="text-center">No</th>
                <th rowspan="2" class="text-center">Nama Anggota</th>
                <th colspan="3" class="text-center">Simpanan</th>
                <th rowspan="2" class="text-center">Action</th>
            </tr>
            <tr>
                <th class="text-center">Pokok</th>
                <th class="text-center">Wajib</th>
                <th class="text-center">Manasuka</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($data as $no => $simpanan)
            
            {{-- @php
                $user = DataBarang::find($item->data_barang_id);
            @endphp --}}
            <tr>
              <td class="text-center">{{ $no+1 }}</td>
              @foreach ($data as $s)
              <td class="text-start">{{ $s->users->name }}</td>    
              @endforeach
              <td class="text-end">{{ number_format($simpanan['simpananpokok'] ,0,',','.')}}</td>
              <td class="text-end">{{ number_format($simpanan['simpananwajib'] ,0,',','.')}}</td>
              <td class="text-end">{{ number_format($simpanan['simpananmanasuka'] ,0,',','.')}}</td>
   
              <td class="text-center">
                <button class="btn bg-gradient-primary m-1" data-bs-toggle="modal" data-bs-target="#exampleModal{{$simpanan->id}}"> <i class="fas fa-pen"></i> Edit</button>
                <a href="{simpanan->id)}}" onclick="return confirm('Apakah anda yakin ingin menghapus data barang?')" class="btn bg-gradient-secondary m-1"><i class="fas fa-trash"></i> Hapus</a></td>                            
              </td>
            </tr>
            @endforeach
          </tbody>
        {{-- <tfoot>
            @foreach ($anggotas as $anggota)
            <tr>
              <th colspan="2" class="text-center">Jumlah</th>
              <th class="text-end">{{ count($anggota->simpananpokok_id) }}</th>
              <th class="text-end">2</th>
              <th class="text-end">3</th>
              <th class="text-end">4</th>
              <th class="text-end">5</th>
              <th class="text-end">6</th>
              <th class="text-end">7</th>
              <th class="text-end">8</th>
              <th class="text-end">9</th>
              <th class="text-end">10</th>
              <th class="text-end">11</th>
              <th class="text-end">12</th>
          </tr>   
            @endforeach
            
        </tfoot> --}}
            
                {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                <th class="text-secondary opacity-7"></th> --}}
              
            
            
          </table>
        </div>
      </div>
    </div>
  </div>

  

@foreach($data as $no => $simpanan)
                
                <form action="{{url('simpanananggota/'. $simpanan->id)}}" method="post">
        @csrf
        @method('PUT')           
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$simpanan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Barang</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
        <div class="container">
        <ol class="breadcrumb mb-3">
          <li class="breadcrumb-item active">Ubah data barang pada kolom dibawah ini untuk mengubah data barang.</li>
        </ol>
            <div class="form-group mt-2">
                <label for="exampleInputEmail1">Simpanan Pokok</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="simpananpokok" value="{{ $simpanan->simpananpokok }}">
            </div>
            <div class="form-group mt-2">
                <label for="exampleInputEmail1">Simpanan Wajib</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="simpananwajib" value="{{ $simpanan->simpananwajib }}">
            </div>
            <div class="form-group mt-2">
                <label for="exampleInputEmail1">Simpanan Manasuka</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="simpananmanasuka" value="{{ $simpanan->simpananmanasuka }}">
            </div>
            
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn bg-gradient-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>
@endforeach

<form action="{{ url('simpanananggota/')}}" method="post">
  @csrf
  @method('POST')           
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Anggota</h1>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body ">
    <div class="mb-3">
  <div class="container">
  <ol class="breadcrumb mb-3">
    <li class="breadcrumb-item active">Isi data pada kolom dibawah ini untuk menambahkan data anggota.</li>
  </ol>
  <label for="select_box" class="form-label"> <b> Pilih Item </b></label>
  {{-- <input type="hidden" name="id" value="{{$data['user']['id']}}"> --}}
  <select class="form-select form-select-lg mb-3 text-start" name="barang" required id="select_box" aria-label="Default select example">
      <option selected>Pilih User</option>
      @foreach ($data as $s)
      <option>{{$s->users->name}}</option>
          
      @endforeach
    </select>
</div>
      <div class="form-group mt-2">
        <label for="exampleInputEmail1">Simpanan Pokok</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="simpananpokok">
    </div>
    <div class="form-group mt-2">
        <label for="exampleInputEmail1">Simpanan Wajib</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="simpananwajib">
    </div>
    <div class="form-group mt-2">
        <label for="exampleInputEmail1">Simpanan Manasuka</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="simpananmanasuka">
    </div>
    
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
  <button type="submit" class="btn bg-gradient-primary">Simpan</button>
</div>
</div>
</div>
</div>
</form>

@endsection