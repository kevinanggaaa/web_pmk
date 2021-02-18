@extends('adminlte.template')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Organisasi PMK ITS</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Organisasi</li>
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

        @if(auth()->user()->hasPermissionTo('add organizational record'))
        <div class="card-tools">
            <div class="">
                <a class="btn btn-success" href="{{ route('organizational-records.create') }}"> Tambah data organisasi</a>
            </div>
        </div>
        @endif
    </div>

    <!-- /.card-header -->
    <div class="card-body p-0">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Posisi</th>
                    <th>Kategori</th>
                    <th>Tahun mulai</th>
                    <th>Tahun selesai</th>
                    @if(auth()->user()->hasAnyPermission(['view detail organizational record', 'edit organizational record', 'delete organizational record']))
                    <th style="width: 280px">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($organizationalRecords as $organizationalRecord)
                <tr>
                    <td>{{ $organizationalRecord->position }}</td>
                    <td>{{ $organizationalRecord->category }}</td>
                    <td>{{ $organizationalRecord->year_start }}</td>
                    <td>{{ $organizationalRecord->year_end }}</td>

                    @if(auth()->user()->hasAnyPermission(['view detail organizational record', 'edit organizational record', 'delete organizational record']))
                    <td>
                        <div style="display: flex">
                            @if(auth()->user()->hasPermissionTo('view detail organizational record'))
                            <div style="margin-right: 5px;">
                                <a class="btn btn-info" href="{{ route('organizational-records.show',$organizationalRecord->id) }}"><i class="fa fa-eye"></i></a>
                            </div>
                            @endif

                            @if(auth()->user()->hasPermissionTo('edit organizational record'))
                            <div style="margin-right: 5px;">
                                <a class="btn btn-primary" href="{{ route('organizational-records.edit',$organizationalRecord->id) }}"><i class="fa fa-edit"></i></a>
                            </div>
                            @endif

                            @if(auth()->user()->hasPermissionTo('delete organizational record'))
                            <div style="margin-right: 5px;">
                                <form action="{{ route('organizational-records.destroy', $organizationalRecord->id) }}" method="POST" class="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger deleteData"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<!-- Datatables -->
<script src="{{ asset('/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endpush