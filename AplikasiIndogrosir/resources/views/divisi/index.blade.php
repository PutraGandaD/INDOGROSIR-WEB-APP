@extends('layout.main')

@section('hoverdivisi','active')
@section('pagetitle', 'Divisi')
@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                            @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success')}}
                            </div>
                            @endif
                            <h1 class="mt-5 mb-5">halaman Divisi PT. INDOMARCO PRISMATAMA PALEMBANG</h1>

                                <a href="{{route('divisi.create')}}" class="btn btn-primary btn-rounded mb-5"><i class="mdi mdi-plus-circle-outline"></i> Tambah Divisi</a>

                            <div class="table-responsive">
                                <table class="table  table-hover table-strip">
                                    <thead>
                                        <tr>
                                            <th>Nama Divisi</th>
                                            <th>Bagian Divisi</th>
                                            <th></th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach ($divisi as $item)
                                        <tr>
                                            <td>{{$item -> nama_divisi}}</td>
                                            <td>{{$item -> bagian_divisi}}</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    @can('update',$item)
                                                         <a href="{{route ('divisi.edit',$item->id)}}"><button class="btn btn-success btn-sm mx-3"><i class="mdi mdi-square-edit-outline"></i> Edit</button></a>
                                                    @endcan

                                                    <form class="delete-form" data-route="{{route('divisi.destroy',$item->id)}}" method="POST" >
                                                        @method('delete')
                                                        @csrf
                                                        @can('delete',$item)
                                                             <button type="submit" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can-outline"></i> Delete</button>
                                                        @endcan
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>

@endsection





