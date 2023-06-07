@extends('layout.main')
@section('hoverdivisi','active')

@section('pagetitle', 'Divisi')

@section('content')



<div class="col-md-12 grid-margin strech-card mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Tambah Divisi</h2>
            <p>tambahkan divisi</p>

            <form class="forms-sample" method="post" action="{{route('divisi.store')}}">
                @csrf
              <div class="form-group">
                <label for="nama_divisi">Nama Divisi</label>
                <input type="text" class="form-control" name="nama_divisi" placeholder="Divisi">
                @error('nama_divisi')
                 <span class="text-danger">{{$message}}</span>
                @enderror

              </div>
              <div class="form-group">
                <label for="bagian_divisi">Nama Bagian</label>
                <input type="text" class="form-control" name="bagian_divisi" placeholder="Bagian">
                @error('bagian_divisi')
                 <span class="text-danger">{{$message}}</span>
                @enderror
              </div>


              <button type="submit"  class="btn btn-info me-2">Tambah</button>
              <a class="btn btn-light" href="{{route('divisi.index')}}" >Batal</a>

            </form>

        </div>
    </div>

</div>


@endsection
