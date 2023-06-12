@extends('layout.main')
@section('pagetitle', 'Produk')
@section('hoverproduk','active')

@section('content')

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
          @endif
          <h4 class="card-title">Produk</h4>
          <a href="{{ route('produk.create')}}" class="btn btn-primary">Tambah</a>
          <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>Nama Produk</th>
                    <th>Foto Produk</th>
                    <th>Brand Produk</th>
                    <th>Kontainer</th>
                    <th>Harga</th>
                </thead>
                @foreach ($produk as $item )
                <tbody>
                    <td>{{$item -> nama_produk}}</td>
                    <td> <img width="500"
                        src="{{ $item->foto_produk ? asset('storage/' . $item->foto_produk) : asset('images/faces/face5.jpg') }}">
                    </td>
                    <td>{{$item -> brand -> nama_brand}}</td>
                    <td>{{$item -> kontainerbarang -> nama_kontainer}}</td>
                    <td>{{$item -> harga_produk}}</td>
                </tbody>
                @endforeach
            </table>
          </div>
        </div>

</div>

    <table class="table table-hover">

    </table>
@endsection
