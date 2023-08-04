@extends('admin.layout.app')
@section('content')
<title>Anggota</title>

<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Anggota</h2>
                        <h5 class="text-white op-7 mb-2">KOPERASI TUTWURI HANDAYANI</h5>
                    </div>
                    <button class="btn btn-secondary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Tambah Anggota
                    </button>
                </div>
            </div>
        </div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Tabel Data Anggota</h4>
                {{-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-eye"></i>
                     Lihat Data Anggota
                </button> --}}
            </div>
        </div>
        <div class="card-body">
            <!-- Modal -->
            <form action="{{ route('anggota.store') }}" method="POST">
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
                                    Anggota
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Lengkapi data dibawah ini untuk menambahkan anggota baru!</p>
                            <div class="col-sm-12 mt-1">
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Pilih User</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="users_id">
                                  @foreach ($users as $s)
                                    <option value="{{ $s->id }}" {{old('users_id') == $s->id ?  'selected' : null}}>{{ $s->name }}
                                    {{-- @foreach($data as $d)
                                      {{$d->users->name}}
                                    @endforeach --}}
                                    </option>
          
                                   @endforeach
                                 </select>
                              </div>
                              {{-- <form action="" method="GET">
                                <div class="form-group">
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1">Search</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Keyword" name="keyword" aria-label="Username" aria-describedby="basic-addon1">
                                    <button class="input-group-text btn btn-dark">Search</button>
                                  </div>
                                </div>
                              </form> --}}
                          </div>
                            <form>
                                <div class="row">
                                    <div class="col-sm-12 mt-1">
                                        <div class="form-group form-group-default">
                                            <label>No Anggota</label>
                                            <input id="addName" type="text" class="form-control" placeholder="no anggota" name="noAnggota">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-1">
                                      <div class="form-group form-group-default">
                                          <label>No Identitas</label>
                                          <input id="addName" type="text-area" class="form-control" placeholder="no identitas" name="noIdentitas">
                                      </div>
                                  </div>
                                    {{-- <div class="col-sm-12 mt-1">
                                        <div class="form-group form-group-default">
                                            <label>Nama Anggota</label>
                                            <input id="addName" type="text" class="form-control" placeholder="nama anggota" name="namaAnggota">
                                        </div>
                                    </div> --}}
                                    <div class="col-sm-12">
                                        <div class="form-check">
                                            <p>Jenis Kelamin</p>
                                            <p class="form-radio-label pl-1" for="L">
                                                <input class="form-radio-input" type="radio" name="jKelamin" value="L" id="L">
                                                <span class="form-radio-sign">Laki-laki</span>
                                            </p>
                                            <p class="form-radio-label pl-1" for="P">
                                                <input class="form-radio-input" type="radio" name="jKelamin" value="P" id="P">
                                                <span class="form-radio-sign">Perempuan</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-1">
                                        <div class="form-group form-group-default">
                                            <label>Tempat Lahir</label>
                                            <input id="addPosition" type="text" class="form-control" placeholder="tempat lahir" name="tempatLahir">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-1">
                                        <div class="form-group form-group-default">
                                            <label>Tanggal Lahir</label>
                                            <input id="addPosition" type="date" class="form-control" placeholder="Tanggal Lahir" name="tglLahir">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-1">
                                      <div class="form-group form-group-default">
                                          <label>No Telepon</label>
                                          <input id="addPosition" type="text" class="form-control" placeholder="no telepon" name="noTelpon">
                                      </div>
                                  </div>
                                    <div class="col-sm-12 mt-1">
                                        <div class="form-group form-group-default">
                                            <label>Alamat</label>
                                            <input id="addName" type="text-area" class="form-control" placeholder="alamat" name="alamat">
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
  
            <div class="table-responsive">
                {{-- <div class="col-sm-12 col-md-6"> --}}
                    {{-- <div class="dataTables_length" id="add-row_length">
                        <label>Show 
                            <select name="add-row_length" aria-controls="add-row" class="form-control form-control-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">5</option>
                                <option value="100">100</option>
                            </select> entries</label>
                        </div>
                    </div> --}}
                    {{-- <div class="col-sm-12 col-md-6">
                        <div id="add-row_filter" class="dataTables_filter">
                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="add-row">
                            </label>
                        </div>
                    </div>
            </div> --}}
                <table id="add-row" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>No</th>
                            
                            <th>No Anggota</th>
                            <th>Nama Anggota</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telepon</th>                       
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    @foreach($data as $no => $anggotafor)
                    {{-- <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Action</th>
                        </tr>
                    </tfoot> --}}
                    <tbody>
                        <tr>
                            <td>{{ $no+1 }}</td>
                            <td>{{ $anggotafor->noAnggota }}</td>
                            <td>  {{ $anggotafor->users->name }} </td>
                            
                            
                            
                            @if($anggotafor->jKelamin == 'L')
                            <td>Laki - Laki</td>
                            @else
                            <td>Perempuan</td>
                            @endif
                            <td>{{ $anggotafor->noTelpon }}</td>
                            {{-- <td> --}}

                                {{-- <form class="flex gap-2" action="{{ route('angg.destroy', $anggotafor->id) }}" method="post">
                                    <a class="bg-green-600 text-white p-3 rounded-lg hover:bg-green-900 transition duration-300 ease-in-out" href="{{ route('angg.show', $anggotafor->id) }}"">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        </svg>
                                    </a>
                                    <a class="bg-green-600 text-white p-3 rounded-lg hover:bg-green-900 transition duration-300 ease-in-out" href="{{ route('angg.edit', $anggotafor->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>           
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 text-white p-3 rounded-lg hover:bg-red-900 transition duration-300 ease-in-out" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </button>
                                </form> --}}

                                {{-- <div class="form-button-action" action="{{ route('angg.destroy', $anggotafor->id) }}" method="post">
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" data-bs-target="#exampleModal{{ route('angg.destroy', $anggotafor->id) }}">
                                        <a href="{{ url('angg.destroy', $anggotafor->id) }}" onclick="return confirm('Apakah anda yakin ingin menghapus data barang?')" class="btn bg-gradient-secondary m-1" method="post"><i class="fas fa-trash"></i> Hapus</a>
                                        <a href="href={{ route('angg.show', $anggotafor->id) }}"></a>
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td> --}}
                            <td>
                                <div class="form-button-action">
                                    
                                    <button type="button" data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task" data-target="#addRowModal{{ $anggotafor->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <a href="{{ route('anggota.show', $anggotafor->id) }}"> 
                                    <button type="button" data-toggle="" title="" class="btn btn-link btn-success btn-lg" data-original-title="" data-target="{{ route('anggota.show', $anggotafor->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </button></a>
                                    </form>
                                    <form action="{{ route('anggota.destroy', $anggotafor->id) }}" method="post" class="mt-1">
                                        @csrf
                                        @method('DELETE')
                                    <button type="delete" data-toggle="" title="" class="btn btn-link btn-danger" data-original-title="Remove" data-target="{{('anggota.destroy'. $anggotafor->id)}}" onclick="return confirm('Apakah anda yakin ingin menghapus data barang?')">
                                        <i class="fa fa-trash"></i>
                                        {{-- <a href=""  class="btn-link btn-dange"></a> --}}
                                    </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


@foreach($data as $no => $anggotafor)
                
                <form action="{{ route('anggota.update', $anggotafor->id)}}" method="post">
        @csrf
        @method('PUT')     
<div class="modal fade" id="addRowModal{{ $anggotafor->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        <h3>Edit</span> 
                            <span class="fw-light">
                                Anggota {{$anggotafor->users->name}}</h3>
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="small">Ubah data dibawah ini untuk mengedit anggota!</p>
                <form>
                    <div class="row">
                        <div class="col-sm-12 mt-1">
                            <div class="form-group form-group-default">
                                <label>No Anggota</label>
                                <input id="addName" type="text" class="form-control" placeholder="no anggota" name="noAnggota" value="{{ $anggotafor->noAnggota }}">
                            </div>
                        </div>
                        <div class="col-sm-12 mt-1">
                          <div class="form-group form-group-default">
                              <label>No Identitas</label>
                              <input id="addName" type="text-area" class="form-control" placeholder="no identitas" name="noIdentitas" value="{{ $anggotafor->noIdentitas }}">
                          </div>
                      </div>
                        {{-- <div class="col-sm-12 mt-1">
                            <div class="form-group form-group-default">
                                <label>Nama Anggota</label>
                                <input id="addName" type="text" class="form-control" placeholder="nama anggota" name="namaAnggota" value="{{ $anggotafor->namaAnggota }}">
                            </div>
                        </div> --}}
                        <div class="col-sm-12">
                            <div class="form-check">
                                <p>Jenis Kelamin</p>
                                <p class="form-radio-label pl-1" for="L">
                                    <input class="form-radio-input" type="radio" name="jKelamin" value="L" id="L"@if ($anggotafor->jKelamin === "L")
                                    checked
                                    @endif>
                                    <span class="form-radio-sign">Laki-laki</span>
                                </p>
                                <p class="form-radio-label pl-1" for="P">
                                    <input class="form-radio-input" type="radio" name="jKelamin" value="P" id="P" @if ($anggotafor->jKelamin === "P")
                                    checked
                                @endif>
                                    <span class="form-radio-sign">Perempuan</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-1">
                            <div class="form-group form-group-default">
                                <label>Tempat Lahir</label>
                                <input id="addPosition" type="text" class="form-control" placeholder="tempat lahir" name="tempatLahir" value="{{ $anggotafor->tempatLahir }}">
                            </div>
                        </div>
                        <div class="col-sm-12 mt-1">
                            <div class="form-group form-group-default">
                                <label>Tanggal Lahir</label>
                                <input id="addPosition" type="date" class="form-control" placeholder="Tanggal Lahir" name="tglLahir" value="{{ $anggotafor->tglLahir }}">
                            </div>
                        </div>
                        <div class="col-sm-12 mt-1">
                          <div class="form-group form-group-default">
                              <label>No Telepon</label>
                              <input id="addPosition" type="text" class="form-control" placeholder="no telepon" name="noTelpon" value="{{ $anggotafor->noTelpon }}">
                          </div>
                      </div>
                        <div class="col-sm-12 mt-1">
                            <div class="form-group form-group-default">
                                <label>Alamat</label>
                                <input id="addName" type="text-area" class="form-control" placeholder="alamat" name="alamat" value="{{ $anggotafor->alamat }}">
                            </div>
                        </div>
                        
                      
                        {{-- <div class="col-sm-12 mt-1">
                            <div class="form-group form-group-default">
                                <label>Password</label>
                                <input id="addName" type="text" class="form-control" placeholder="password" name="password" value="{{ $anggotafor->password }}">
                            </div>
                        </div> --}}
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
@endforeach
@endsection