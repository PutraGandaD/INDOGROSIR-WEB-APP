@extends('layout.main')

@section('title', 'Tambah Kontainer Barang')
@section('subtitle', 'Kontainer Barang')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Kontainer Barang</h4>
            <p class="card-description">
              Formulir Edit Kontainer
            </p>
            <form class="forms-sample" action="{{ route('kontainerbarang.update', $kontainerbarang->id)}}" method="post">
              @csrf
              @method('patch')
              <div class="form-group">
                <label for="nama_kontainer">Nama Kontainer Barang</label>
                <input type="text" class="form-control" name="nama_kontainer" placeholder="Nama Kontainer" value="{{ $kontainerbarang->nama_kontainer }}">
                @error('nama_kontainer')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary me-2 mt-3">Simpan</button>
              <a href="{{ route('kontainerbarang.index')}}" class="btn btn-light mt-3">Batal</button>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection
