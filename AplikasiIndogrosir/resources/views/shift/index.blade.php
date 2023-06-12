@extends('layout.main')
@section('hovershift','active')
@section('pagetitle', 'Shift Kerja')

@section('content')


    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-body">
                            @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success')}}
                            </div>
                            @endif
                            <h1 class="mt-5 mb-5">Salaman hift Pegawai PT. INDOMARCO PRISMATAMA PALEMBANG</h1>
                         <a href="{{route('shift.create')}}" class="btn btn-primary btn-rounded mb-5">Tambah Shift</a>
                            <div class="table-responsive">
                                <table class="table table-hover table-strip">
                                    <thead>
                                        <tr>
                                            <th>Waktu Shift</th>
                                            <th>Jam Kerja</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach ($shift as $item)
                                        <tr>
                                            <td>{{$item -> waktu_shift}}</td>
                                            <td>{{$item -> jam_kerja}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
</div>

@endsection
