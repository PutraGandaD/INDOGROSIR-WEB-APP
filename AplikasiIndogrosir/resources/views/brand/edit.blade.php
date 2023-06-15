@extends('layout.main')

@section('title', 'Tambah Brand')
@section('subtitle', 'Brand')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Brand</h4>
            <p class="card-description">
              Formulir Edit Brand
            </p>
            <form class="forms-sample" action="{{ route('brand.update', $brand->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('patch')
              <div class="form-group">
                <label for="nama_brand">Nama Brand</label>
                <input type="text" class="form-control" name="nama_brand" placeholder="Nama Brand" value="{{ $brand->nama_brand }}"">
                @error('nama_brand')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="logo_brand">Logo Brand</label>
                <input type="file" class="form-control" name="logo_brand" placeholder="logo_brand" accept="image/*" capture="camera">
                @error('logo_brand')
                   <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary me-2 mt-3">Simpan</button>
              <a href="{{ route('brand.index')}}" class="btn btn-light mt-3">Batal</button>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection

