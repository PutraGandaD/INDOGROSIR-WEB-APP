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
          <a href="{{ route('kontainerbarang.create')}}" class="btn btn-primary mb-5">Tambah</a>
          <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>Nama Kontainer</th>
                    <th>Created At</th>
                    <th> </th>
                    <th> </th>
                </thead>
                @foreach ($kontainerbarang as $item )
                <tbody>
                    <td>{{$item -> nama_kontainer}}</td>
                    <td>{{$item -> created_at}}</td>
                    <td>
                        <a href="{{route('kontainerbarang.edit', $item->id)}}"><button class="btn btn-success btn-sm">Edit</button></a>
                    </td>
                    <td>
                        <form method="post" class="delete-form"
                        data-route="{{ route('kontainerbarang.destroy', $item->id) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    </td>
                </tbody>
                @endforeach
            </table>
          </div>
        </div>

</div>


@endsection
