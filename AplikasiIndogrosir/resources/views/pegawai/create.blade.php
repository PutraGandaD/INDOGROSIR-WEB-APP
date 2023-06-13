@extends('layout.main')
@section('pagetitle', 'Pegawai')
@section('hoverpegawai','active')

@section('content')

<div class="col-md-12 grid-margin strech-card mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Tambah Pegawai</h2>
            <p class="mb-5">tambahkan Pegawai</p>

            <form class="forms-sample" method="post" enctype="multipart/form-data" action="{{route('pegawai.store')}}">
                @csrf
              <div class="form-group">
                <label for="kode_pegawai">Kode Pegawai</label>
                <input type="text" class="form-control" name="kode_pegawai" placeholder="KodePegawai">
                @error('kode_pegawai')
                 <span class="text-danger">{{$message}}</span>
                @enderror

              </div>
              <div class="form-group">
                <label for="nama_pegawai">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama_pegawai" placeholder="Nama">
                @error('nama_pegawai')
                 <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="alamat">
                @error('alamat')
                 <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="nomor_hp">Nomor Hp</label>
                <input type="text" class="form-control" name="nomor_hp" placeholder="nomor_hp">
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
              </div>

              <div class="form-group">
                <label for="foto_pegawai">Upload Foto</label>
                <input type="file" class="form-control" name="foto_pegawai" placeholder="foto_pegawai" accept="image/*" capture="camera">
                @error('foto_pegawai')
                   <span class="text-danger">{{$message}}</span>
                @enderror
              </div>


              <button type="submit"  class="btn btn-success me-2">Tambah</button>
              <a class="btn btn-light" href="{{route('pegawai.index')}}" >Batal</a>

            </form>

        </div>
    </div>

</div>

@endsection
