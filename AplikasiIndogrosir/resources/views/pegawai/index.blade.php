@extends('layout.main')
@section('pagetitle', 'Pegawai')
@section('hoverpegawai','active')

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
                                        <th>Foto Pegawai</th>
                                        <th>Kode Pegawai</th>
                                        <th>Nama Pegawai</th>
                                        <th>Divisi</th>
                                        <th>Shift</th>
                                        <th>Alamat</th>
                                        <th>Nomor Telp</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($pegawai as $item)
                                    <tr>
                                        <td><img src="{{asset('storage/'.$item->foto_pegawai)}}" alt="foto" width="100"></td>
                                        <td>{{$item -> kode_pegawai}}</td>
                                        <td>{{$item -> nama_pegawai}}</td>
                                        <td>{{$item -> divisi -> nama_divisi}}</td>
                                        <td>{{$item -> shift -> waktu_shift}}</td>
                                        <td>{{$item -> alamat}}</td>
                                        <td>{{$item -> nomor_hp}}</td>

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
