@extends('layout.main')
@section('hovershift','active')
@section('pagetitle', 'Edit Shift')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Shift</h4>

            <form class="forms-sample" action="{{ route('shift.update',$shift->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('patch')
              <div class="form-group">
                <label for="waktu_shift">WAKTU SHIFT</label>
                <input type="text" class="form-control" name="waktu_shift" placeholder="Waktu Shift"value="{{$shift->waktu_shift}}" disabled>
              </div>
              <div class="form-group">
                <label for="jam_kerja">Jam Kerja</label>
                <input type="text" class="form-control" name="jam_kerja" placeholder="Jam Kerja" value="{{$shift->jam_kerja}}">
                @error('jam_kerja')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary me-2 mt-3">Simpan</button>
              <a href="{{ route('shift.index')}}" class="btn btn-light mt-3">Batal</button>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection
