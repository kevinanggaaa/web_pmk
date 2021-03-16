@extends('adminlte.template')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@elseif ($message = Session::get('fail'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Landing Page PMK ITS</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Jumlah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="card">
    <div class="card-header">

        {{-- notifikasi form validasi --}}
        @if ($errors->has('file'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('file') }}</strong>
        </span>
        @endif

        {{-- notifikasi sukses --}}
        @if ($sukses = Session::get('sukses'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $sukses }}</strong>
        </div>
        @endif

        <div class="card-tools">
            <div class="">
                <a class="btn btn-success" href="{{ route('landingPage.createCount') }}"> Tambah Jumlah</a>
            </div>
        </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body p-0">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Jumlah Mahasiswa</th>
                    <th>Jumlah Dosen</th>
                    <th>Jumlah Alumni</th>
                    <th>Jumlah Event</th>
                    <th style="width: 280px">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($counts as $count)
                <tr>
                    <td>{{ $count->id }}</td>
                    <td>{{ $count->students }}</td>
                    <td>{{ $count->lecturers }}</td>
                    <td>{{ $count->alumnis }}</td>
                    <td>{{ $count->events }}</td>
                    
                    <td>
                        <div style="display: flex">

                            <div style="margin-right: 5px;">
                                <a class="btn btn-info" href="{{ route('landingPage.showCount',$count->id) }}"><i class="fa fa-eye"></i></a>
                            </div>

                            <div style="margin-right: 5px;">
                                <a class="btn btn-primary" href="{{ route('landingPage.editCount',$count->id) }}"><i class="fa fa-edit"></i></a>
                            </div>
                            
                            <div style="margin-right: 5px;">
                                <form action="{{ route('landingPage.deleteCount', $count->id) }}" method="POST" class="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger deleteData"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<!-- Datatables -->
<script src="{{ asset('/AdminLTE-3.0.5/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/AdminLTE-3.0.5/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('/AdminLTE-3.0.5/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('/AdminLTE-3.0.5/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endpush