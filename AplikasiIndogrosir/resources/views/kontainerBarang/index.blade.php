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
          <a href="{{ route('kontainerbarang.create')}}" class="btn btn-primary mb-5"><i class="mdi mdi-plus-circle-outline"></i> Tambah</a>
          <div class="table-responsive">
            <table class="table table-strip table-hover">
                <thead>
                    <th>Nama Kontainer</th>
                    <th>Created At</th>
                    <th> </th>
                </thead>
                @foreach ($kontainerbarang as $item )
                <tbody>
                    <td>{{$item -> nama_kontainer}}</td>
                    <td>{{\Carbon\Carbon::parse($item->created_at)->isoFormat('DD MMM YYYY')}}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            @can('update',$item)

                                <a href="{{route('kontainerbarang.edit', $item->id)}}"><button class="btn btn-success btn-sm mx-3"><i class="mdi mdi-square-edit-outline"></i> Edit</button></a>
                            @endcan
                            <form method="post" class="delete-form"
                            data-route="{{ route('kontainerbarang.destroy', $item->id) }}">
                            @method('delete')
                            @csrf
                            @can('delete',$item)

                            <button type="submit" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can-outline"></i> Delete</button>
                            @endcan
                             </form>
                        </div>
                    </td>

                </tbody>
                @endforeach
            </table>
          </div>
        </div>

</div>


@endsection
