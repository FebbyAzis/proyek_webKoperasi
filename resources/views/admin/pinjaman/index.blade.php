@extends('admin.layout.app')
@section('content')
    <title>Anggota</title>

    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Simpanan Anggota</h2>
                            <h5 class="text-white op-7 mb-2">KOPERASI TUTWURI HANDAYANI</h5>
                        </div>
                        <button class="btn btn-secondary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Tambah Simpanan Anggota
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tabel Simpanan Anggota</h4>
                            {{-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-eye"></i>
                     Lihat Data Anggota
                </button> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->

                        
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama Anggota</th>
                                        <th>Jenis Pinjaman</th>
                                        <th>Jumlah</th>

                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $no => $p)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $p->tanggal }}</td>
                                            {{-- <td>{{ $s->anggota->noAnggota }}</td> --}}
                                            <td>{{ $p->users->name }}</td>
                                            <td>{{ $p->jenisPinjaman->namaPinjaman }}</td>
                                            <td>{{ number_format($p['jumlahPinjaman'], 0, ',', '.') }}</td>
                                            {{-- @php
                                $bungar = $p->jumlah * $p->bunga / 100;
                                $total = $p->jumlah + $bungar;
                            @endphp
                            <td>{{ number_format($total ,0,',','.') }}</td>
                            <td>{{ $p->lama }}</td>
                            @php
                                $bungareq = $p->jumlah * $p->bunga / 100;
                            @endphp
                            
                            <td>{{ $bungareq }}</td> --}}

                                            <td>
                                                <div class="form-button-action">

                                                    <button type="button" data-toggle="modal" title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task"
                                                        data-target="#addRowModal{{ $p->id }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <a href="{{ route('pinjaman.show', $p->id) }}">
                                                        <button type="button" data-toggle="" title=""
                                                            class="btn btn-link btn-success btn-lg" data-original-title=""
                                                            data-target="{{ route('pinjaman.show', $p->id) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </button></a>
                                                    </form>
                                                    <form action="{{ route('pinjaman.destroy', $p->id) }}" method="post"
                                                        class="mt-1">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="delete" data-toggle="" title=""
                                                            class="btn btn-link btn-danger" data-original-title="Remove"
                                                            data-target="{{ 'pinjaman.destroy' . $p->id }}"
                                                            onclick="return confirm('Apakah anda yakin ingin menghapus data barang?')">
                                                            <i class="fa fa-trash"></i>
                                                            {{-- <a href=""  class="btn-link btn-dange"></a> --}}
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


            <form action="{{ route('pinjaman.store') }}" method="POST">
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
                                <p class="small">Lengkapi data dibawah ini untuk menambahkan simpanan anggota
                                    baru!</p>
                                <div class="col-sm-12 mt-1">

                                </div>
                                <form>
                                    <div class="row">

                                        <div class="col-sm-12 mt-1">
                                            <div class="form-group form-group-default">
                                                <label>Tanggal</label>
                                                <input id="addName" type="date" class="form-control"
                                                    placeholder="" name="tanggal">
                                            </div>
                                        </div>

                                        <div class="col-sm-12 mt-1">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Pilih User</label>
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                    name="users_id">
                                                    @foreach ($user as $users)
                                                        <option value="{{ $users->id }}">{{ $users->name }}
                                                            {{-- @foreach ($data as $d)
                                      {{$d->users->name}}
                                    @endforeach --}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 mt-1">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Pilih Jenis
                                                    Pinjaman</label>
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                    name="jenispinjaman_id">
                                                    @foreach ($jenis as $jen)
                                                        <option value="{{ $jen->id }}">
                                                            {{ $jen->namaPinjaman }}
                                                            {{-- @foreach ($data as $d)
                                      {{$d->users->name}}
                                    @endforeach --}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 mt-1">
                                            <div class="form-group form-group-default">
                                                <label>Jumlah</label>
                                                <input id="addName" type="text" class="form-control"
                                                    placeholder="jumlah" name="jumlahPinjaman">
                                            </div>
                                        </div>

                                        <div class="col-sm-12 mt-1">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Tempo</label>
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                    name="lama">

                                                    <option value="">-</option>
                                                    <option value="6">6 Bulan</option>
                                                    <option value="12">12 Bulan</option>
                                                    <option value="24">24 Bulan</option>



                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 mt-1">
                                            <div class="form-group form-group-default">
                                                <label>Bunga</label>
                                                <input id="addName" type="text" class="form-control"
                                                    placeholder="bunga" name="bunga">
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
                                <button type="button" class="btn btn-danger"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            @foreach ($data as $no => $p)
                <form action="{{ route('pinjaman.update', $p->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal fade" id="addRowModal{{ $p->id }}" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">
                                            <h3>Edit
                                        </span>
                                        <span class="fw-light">
                                            Simpanan {{ $p->users->name }}</h3>
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
                                                    <input id="addName" type="date" class="form-control"
                                                        placeholder="" name="tanggal" value="{{ $p->tanggal }}">
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12 mt-1">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Pilih Jenis
                                                        Pinjaman</label>
                                                    <select class="form-control" id="exampleFormControlSelect1"
                                                        name="jenispinjaman_id">
                                                        @foreach ($jenis as $jen)
                                                            <option value="{{ $jen->id }}">
                                                                {{ $jen->namaPinjaman }}
                                                                {{-- @foreach ($data as $d)
                                          {{$d->users->name}}
                                        @endforeach --}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
    
                                            <div class="col-sm-12 mt-1">
                                                <div class="form-group form-group-default">
                                                    <label>Jumlah</label>
                                                    <input id="addName" type="text" class="form-control"
                                                        placeholder="jumlah" name="jumlah" value="{{ $p->jumlah }}">
                                                </div>
                                            </div>
    
                                            <div class="col-sm-12 mt-1">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Tempo</label>
                                                    <select class="form-control" id="exampleFormControlSelect1"
                                                        name="lama">
    
                                                        <option value="">-</option>
                                                        <option value="6">6 Bulan</option>
                                                        <option value="12">12 Bulan</option>
                                                        <option value="24">24 Bulan</option>
    
    
    
                                                    </select>
                                                </div>
                                            </div>
    
                                            <div class="col-sm-12 mt-1">
                                                <div class="form-group form-group-default">
                                                    <label>Bunga</label>
                                                    <input id="addName" type="text" class="form-control"
                                                        placeholder="bunga" name="bunga" value="{{ $p->bunga }}">
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
