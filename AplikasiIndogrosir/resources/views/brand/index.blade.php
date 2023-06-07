@extends('layout.main')
@section('pagetitle', 'Brand Produk')
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
          <h4 class="card-title">Brand</h4>
          <a href="{{ route('brand.create')}}" class="btn btn-primary">Tambah</a>
          <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>Nama Brand</th>
                    <th>Logo Brand</th>
                    <th>Created At</th>
                </thead>
                @foreach ($brand as $item )
                <tbody>
                    <td>{{$item -> nama_brand}}</td>
                    <td> <img width="50"
                        src="{{ $item->logo_brand ? asset('storage/' . $item->logo_brand) : asset('images/faces/face5.jpg') }}">
                    </td>
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
