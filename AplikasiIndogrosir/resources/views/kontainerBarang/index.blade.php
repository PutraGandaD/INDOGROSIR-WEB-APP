@extends('layout.main')
@section('pagetitle', 'Kontainer Barang')
@section('hoverkontainer','active')

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
          <h4 class="card-title">Kontainer Barang</h4>
          <a href="{{ route('kontainerbarang.create')}}" class="btn btn-primary">Tambah</a>
          <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>Nama Kontainer</th>
                    <th>Created At</th>
                </thead>
                @foreach ($kontainerBarang as $item )
                <tbody>
                    <td>{{$item -> nama_kontainer}}</td>
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
