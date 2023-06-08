@extends('layout.main')
@section('pagetitle', 'Produk')
@section('hoverproduk','active')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Produk</h4>
            <p class="card-description">
              Formulir tambah Produk
            </p>
            <form class="forms-sample" action="{{ route('produk.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk">
                @error('nama_produk')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="brand_id">Nama Brand</label>
                <select name="brand_id" class="form-control js-example-basic-single">
                    <option value="">Pilih nama Brand...</option>
                    @foreach ($brand as $item)
                        <option value="{{ $item['id'] }}">
                            {{ $item['nama_brand'] }}
                        </option>
                    @endforeach
                </select>
                @error('brand_id')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="foto_produk">Foto Produk</label>
                <input type="file" class="form-control" name="foto_produk" placeholder="Foto" accept="image/*" capture="camera">
                @error('foto_produk')
                   <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="kontainer_id">Nama Kontainer</label>
                <select name="kontainer_id" class="form-control js-example-basic-single">
                    <option value="">Pilih nama Kontainer...</option>
                    @foreach ($kontainerbarang as $item)
                        <option value="{{ $item['id'] }}">
                            {{ $item['nama_kontainer'] }}
                        </option>
                    @endforeach
                </select>
                @error('kontainer_id')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="harga_produk">Harga</label>
                <input type="text" class="form-control" name="harga_produk" placeholder="Harga Produk">
                @error('harga_produk')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary me-2 mt-3">Simpan</button>
              <a href="{{ route('produk.index')}}" class="btn btn-light mt-3">Batal</button>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection
