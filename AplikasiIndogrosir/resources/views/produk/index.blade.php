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
          <a href="{{ route('produk.create')}}" class="btn btn-primary mb-5">Tambah</a>
          {{-- <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>Foto Produk</th>
                    <th>Nama Produk</th>
                    <th>Brand Produk</th>
                    <th>Kontainer</th>
                    <th>Harga</th>
                    <th> </th>
                </thead>
                @foreach ($produk as $item )
                <tbody>
                    <td> <img width="200"
                        src="{{ $item->foto_produk ? asset('storage/' . $item->foto_produk) : asset('images/faces/face5.jpg') }}">
                    </td>
                    <td>{{$item -> nama_produk}}</td>
                    <td>{{$item -> brand -> nama_brand}}</td>
                    <td>{{$item -> kontainerbarang -> nama_kontainer}}</td>
                    <td>{{$item -> harga_produk}}</td>
                </tbody>
                @endforeach
            </table> --}}

            <div class="row">
                @foreach ($produk as $item)
                    <div class="card mb-3 mx-5" style="max-width: 540px;">
                        <div class="row g-0">
                        <div class="col-md-4">
                            <img width="240" height="240"  src="{{ $item->foto_produk ? asset('storage/' . $item->foto_produk) : asset('images/faces/face5.jpg') }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body ml-7">
                                <div class="mb-2">
                                    <h5 class="card-title">{{$item -> nama_produk}}</h5>
                                    <p class="card-text">Brand {{$item -> brand -> nama_brand}}</p>
                                    <p class="card-text">{{$item -> kontainerbarang -> nama_kontainer}}</p>
                                    <p class="card-text">Harga {{$item -> harga_produk}}</p>
                                    <p class="card-text">Stok</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="{{route('produk.edit', $item->id)}}"><button class="btn btn-success btn-sm">Edit</button></a>
                                    <form method="post" class="delete-form"
                                        data-route="{{ route('produk.destroy', $item->id) }}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
</div>

    <table class="table table-hover">

    </table>
@endsection
