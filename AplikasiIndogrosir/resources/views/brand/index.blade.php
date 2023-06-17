@extends('layout.main')
@section('pagetitle', 'Brand Produk')
@section('hoverbrand','active')
@section('search')
<form method="GET">
    <div class="input-group input-group-sm" id="input-group-search">
      <input type="text" name="search" class="form-control" placeholder="Cari Nama Brand ..." />
    </div>
  </form>
@endsection

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
          <a href="{{ route('brand.create')}}" class="btn btn-primary mb-5"><i class="mdi mdi-plus-circle-outline"></i> Tambah</a>
          {{-- <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>Nama Brand</th>
                    <th>Logo Brand</th>
                </thead>
                @foreach ($brand as $item )
                <tbody>
                    <td>{{$item -> nama_brand}}</td>
                    <td> <img width="50"
                        src="{{ $item->logo_brand ? asset('storage/' . $item->logo_brand) : asset('images/faces/face5.jpg') }}">
                    </td>
                </tbody>
                @endforeach
            </table> --}}
            <div class="row">
                @foreach ($brand as $item)
                    <div class="col-lg-4">
                        <div class="card shadow mb-5">
                            <img src="{{ $item->logo_brand ? asset('storage/' . $item->logo_brand) : asset('images/faces/face5.jpg') }}">
                            <div class="card-body">
                                <h5 class="card-title">{{$item -> nama_brand}}</h5>
                                <div class="d-flex justify-content-between">
                                    @can('update',$item)

                                    <a href="{{route('brand.edit', $item->id)}}"><button class="btn btn-success btn-sm"><i class="mdi mdi-edit-square-outline"></i> Edit</button></a>
                                    @endcan
                                    <form method="post" class="delete-form"
                                        data-route="{{ route('brand.destroy', $item->id) }}">
                                        @method('delete')
                                        @csrf
                                        @can('delete',$item)

                                        <button type="submit" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can-outline"></i> Delete</button>
                                        @endcan
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</div>

@endsection
