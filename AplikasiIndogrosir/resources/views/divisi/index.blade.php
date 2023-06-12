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

                                                    <form class="delete-form" data-route="{{route('divisi.destroy',$item->id)}}" method="POST" >
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

@endsection



{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://www.jqueryscript.net/demo/check-all-rows/dist/TableCheckAll.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

     $("#posts-table").TableCheckAll();

    $('#multi-delete').on('click', function() {
        var button = $(this);
        var selected = [];
        $('#posts-table .check:checked').each(function() {
        selected.push($(this).val());
        });

        Swal.fire({
        icon: 'warning',
            title: 'Apakah kmu yaqueen mau hapus yang ini ?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Yes'
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: button.data('route'),
            data: {
                'selected': selected
            },
            success: function (response, textStatus, xhr) {
                Swal.fire({
                icon: 'success',
                    title: response,
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: 'Yes'
                }).then((result) => {
                window.location='/divisi.index'
                });
            }
            });
        }
        });
    });

    $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        var button = $(this);

        Swal.fire({
        icon: 'warning',
            title: 'Apakah kmu yaqueen mau hapus yang ini ?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Yes'
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: button.data('route'),
            data: {
                '_method': 'delete'
            },
            success: function (response, textStatus, xhr) {
                Swal.fire({
                icon: 'success',
                    title: response,
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: 'Yes'
                }).then((result) => {
                window.location='/divisi.index'
                });
            }
            });
        }
        });

    })
    });
</script> --}}

