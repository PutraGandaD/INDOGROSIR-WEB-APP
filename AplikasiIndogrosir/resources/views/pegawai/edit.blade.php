@extends('layout.main')
@section('pagetitle', 'Tambah Pegawai')
@section('hoverpegawai','active')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin strech-card">
        <div class="card mb-5">
            <div class="card-body">
                <h2 class="card-title">Edit Pegawai</h2>
                <p class="mb-5">Pegawai</p>

                <form class="forms-sample" method="post" enctype="multipart/form-data" action="{{route('pegawai.update',$pegawai->id)}}">
                    @csrf
                    @method('patch')
                  <div class="form-group">
                    <label for="kode_pegawai">Kode Pegawai</label>
                    <input type="text" class="form-control" name="kode_pegawai" placeholder="KodePegawai" value="{{$pegawai->kode_pegawai}}" disabled>
                    @error('kode_pegawai')
                     <span class="text-danger">{{$message}}</span>
                    @enderror

                  </div>
                  <div class="form-group">
                    <label for="nama_pegawai">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_pegawai" value="{{$pegawai->nama_pegawai}}" placeholder="Nama">
                    @error('nama_pegawai')
                     <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="{{$pegawai->alamat}}" placeholder="alamat">
                    @error('alamat')
                     <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="nomor_hp">Nomor Hp</label>
                    <input type="text" class="form-control" name="nomor_hp" value="{{$pegawai->nomor_hp}}" placeholder="nomor_hp">
                    @error('nomor_hp')
                     <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="divisi_id">Divisi</label>
                    <select name="divisi_id" class="form-control js-example-basic-single">
                        <option value="">Pilih Divisi.</option>
                        @foreach ($divisi as $item)
                            <option value="{{ $item['id'] }}">
                                {{ $item['nama_divisi'] }}
                            </option>
                        @endforeach
                    </select>
                    @error('divisi_id')
                    <span class="text-danger">{{ $message }} </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="shift_id">Shift</label>
                    <select name="shift_id" class="form-control js-example-basic-single">
                        <option value="">Pilih Shift.</option>
                        @foreach ($shift as $item)
                            <option value="{{ $item['id'] }}">
                                {{ $item['waktu_shift'] }}
                            </option>
                        @endforeach
                    </select>
                    @error('shift_id')
                    <span class="text-danger">{{ $message }} </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="foto_pegawai">Foto</label>
                    <input type="file" class="form-control" name="foto_pegawai" placeholder="foto_pegawai" accept="image/*" value="{{$pegawai->foto_pegawai}}"capture="camera">
                    @error('foto_pegawai')
                       <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>


                  <button type="submit"  class="btn btn-success me-2">Tambah</button>
                  <a class="btn btn-light" href="{{route('pegawai.index')}}" >Batal</a>

                </form>

            </div>




</div>


@endsection
