@extends('admin.layout.app')
@section('content')
<title>Anggota</title>

<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Jasa Anggota</h2>
                        <h5 class="text-white op-7 mb-2">KOPERASI TUTWURI HANDAYANI</h5>
                    </div>
                    <button class="btn btn-secondary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Tambah Jasa Anggota
                    </button>
                </div>
            </div>
        </div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Tabel Data Jasa Anggota</h4>
                {{-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-eye"></i>
                     Lihat Data Anggota
                </button> --}}
            </div>
        </div>
        <div class="card-body">
            <!-- Modal -->
            <form action="{{ route('jasaAnggota.store') }}" method="POST">
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
                                    Jasa Anggota
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Lengkapi data dibawah ini untuk menambahkan jasa anggota baru!</p>
                            <div class="col-sm-12 mt-1">
                          
                          </div>
                            <form>
                                <div class="row">

                                    

                                    <div class="col-sm-12 mt-1">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Pilih User</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="users_id">
                                              @foreach ($user as $users)
                                                <option value="{{ $users->id }}">{{$users->name}}
                                                {{-- @foreach($data as $d)
                                                  {{$d->users->name}}
                                                @endforeach --}}
                                                </option>
                      
                                               @endforeach
                                             </select>
                                          </div>
                                    </div>

                                    <div class="col-sm-12 mt-1">
                                        <div class="form-group form-group-default">
                                            <label>Hutang Barang</label>
                                            <input id="addName" type="text" class="form-control" placeholder="hutang barang" name="hutangBarang">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12 mt-1">
                                        <div class="form-group form-group-default">
                                            <label>Hutang Uang</label>
                                            <input id="addName" type="text" class="form-control" placeholder="hutang uang" name="hutangUang">
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
                            
                            <th>Nama Anggota</th>
                            <th>Hutang Barang</th>
                            <th>Hutang Uang</th>                     
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($data as $no => $j)
                    <tbody>
                        <tr>
                            <td>{{ $no+1 }}</td>
                            
                            <td>{{ $j->users->name }}</td>
                            <td>{{ number_format($j['hutangBarang'] ,0,',','.') }}</td>
                            <td>{{ number_format($j['hutangUang'] ,0,',','.') }}</td>
                            <td>
                                <div class="form-button-action">
                                    
                                    <button type="button" data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task" data-target="#addRowModal{{ $j->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    </form>
                                    <form action="{{ route('jasaAnggota.destroy', $j->id) }}" method="post" class="mt-1">
                                        @csrf
                                        @method('DELETE')
                                    <button type="delete" data-toggle="" title="" class="btn btn-link btn-danger" data-original-title="Remove" data-target="{{('jasaAnggota.destroy'. $j->id)}}" onclick="return confirm('Apakah anda yakin ingin menghapus data barang?')">
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


@foreach($data as $no => $j)
                
                <form action="{{ route('jasaAnggota.update', $j->id)}}" method="post">
        @csrf
        @method('PUT')     
<div class="modal fade" id="addRowModal{{ $j->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                    <h3>Edit</span> 
                    <span class="fw-light">
                        Jasa Anggota {{$j->users->name}}</h3>
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="small">Ubah data dibawah ini untuk mengedit jasa anggota!</p>
                <form>
                    <div class="row">

                        

                        

                        {{-- <div class="col-sm-12 mt-1">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Pilih User</label>
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
                                <label>Hutang Barang</label>
                                <input id="addName" type="text" class="form-control" placeholder="hutang barang" name="hutangBarang" value="{{$j->hutangBarang}}">
                            </div>
                        </div>

                        <div class="col-sm-12 mt-1">
                            <div class="form-group form-group-default">
                                <label>Hutang Uang</label>
                                <input id="addName" type="text" class="form-control" placeholder="hutang uang" name="hutangUang" value="{{ $j->hutangUang }}">
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
@endforeach
@endsection