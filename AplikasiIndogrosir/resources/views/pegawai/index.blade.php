@extends('layout.main')
@section('pagetitle', 'Pegawai')
@section('hoverpegawai','active')

@section('search')
<form method="GET">
    <div class="input-group input-group-sm" id="input-group-search">
      <input type="text" name="search" class="form-control" placeholder="Cari Pegawai ..." />
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
                            {{ Session::get('success')}}
                        </div>
                        @endif
                        <h1 class="mt-5 mb-5">halaman Pegawai PT. INDOMARCO PRISMATAMA PALEMBANG</h1>
                     <a href="{{route('pegawai.create')}}" class="btn btn-primary btn-rounded mb-5">Tambah Pegawai</a>
                        <div class="table-responsive">
                            <table class="table  table-hover table-strip">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Kode Pegawai</th>
                                        <th>Nama Pegawai</th>
                                        <th>Divisi</th>
                                        <th>Shift</th>
                                        <th>Alamat</th>
                                        <th>Nomor Telp</th>
                                        <th>Tanggal Masuk</th>
                                        <th></th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($pegawai as $item)
                                    <tr>
                                        <td class="text-center"><img src="{{asset('storage/'.$item->foto_pegawai)}}" alt="foto" width="50" height="50"></td>
                                        <td>{{$item -> kode_pegawai}}</td>
                                        <td>{{$item -> nama_pegawai}}</td>
                                        <td>{{$item -> divisi -> nama_divisi}}</td>
                                        <td>{{$item -> shift -> waktu_shift}}</td>
                                        <td>{{$item -> alamat}}</td>
                                        <td>{{$item -> nomor_hp}}</td>
                                        <td>{{\Carbon\Carbon::parse($item->created_at)->isoFormat('DD MMM YYYY')}}</td>
                                        <td>
                                             <div class="d-flex justify-content-end">
                                                    <a href="{{route ('pegawai.edit',$item->id)}}"><button class="btn btn-success btn-sm mx-3">Edit</button></a>


                                                    <form class="delete-form" data-route="{{route('pegawai.destroy',$item->id)}}" method="POST" >
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
                            <div class="mt-4">
                                {{$pegawai -> withQueryString()->links('pagination::bootstrap-5')}}
                            </div>
                        </div>
                </div>
</div>

@endsection
