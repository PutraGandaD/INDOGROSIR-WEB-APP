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
                     <a href="{{route('divisi.create')}}" class="btn btn-primary btn-rounded mb-5">Tambah Divisi</a>
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
                                            <div class="d-flex justify-content">

                                                <form class="delete-form" data-route="{{'divisi.destroy', $item->id}}" method="POST" >
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
        </div>
    </div>
</div>


@endsection
