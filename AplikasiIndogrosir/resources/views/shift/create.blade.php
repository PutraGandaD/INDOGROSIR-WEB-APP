@extends('layout.main')
@section('hovershift','active')
@section('pagetitle', 'Shift Kerja')

@section('content')

<div class="col-md-12 grid-margin strech-card mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Tambah Wshift</h2>
            <p>tambahkan Shift</p>

            <form class="forms-sample" method="post" action="{{route('shift.store')}}">
                @csrf
              <div class="form-group">
                <label for="waktu_shift">Waktu Shift</label>
                <input type="text" class="form-control" name="waktu_shift" placeholder="Tambah waktu">
                @error('waktu_shift')
                 <span class="text-danger">{{$message}}</span>
                @enderror

              </div>
              <div class="form-group">
                <label for="jam_kerja">Jam Kerja</label>
                <input type="text" class="form-control" name="jam_kerja" placeholder="Jam Kerja">
                @error('jam_kerja')
                 <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <button type="submit"  class="btn btn-success me-2">Tambah</button>
              <a class="btn btn-light" href="{{route('shift.index')}}" >Batal</a>

            </form>

        </div>
    </div>

</div>


@endsection
