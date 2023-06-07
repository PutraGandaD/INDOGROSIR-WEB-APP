@extends('layout.main')
@section('pagetitle', 'Produk')
@section('hoverbrand','active')

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
                    <th>Brand Produk</th>
                    <th>Foto Produk</th>
                    <th>Kontainer</th>
                    <th>Harga</th>
                </thead>
                @foreach ($kontainerBarang as $item )
                <tbody>
                    <td>{{$item -> nama_produk}}</td>
                    <td>{{$item -> created_at}}</td>
                </tbody>
                @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
</div>

    <table class="table table-hover">

    </table>
@endsection
