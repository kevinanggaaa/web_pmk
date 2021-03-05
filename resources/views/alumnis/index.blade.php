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
                <h1>Alumni PMK ITS</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Alumni</li>
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

        @if(auth()->user()->hasPermissionTo('add alumni'))
        <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
            IMPORT EXCEL
        </button>

        <!-- Import Excel -->
        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" action="{{route('alumnis.import_excel')}}" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                        </div>
                        <div class="modal-body">

                            {{ csrf_field() }}

                            <label>Pilih file excel</label>
                            <div class="form-group">
                                <input type="file" name="file" required="required">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif

        @if(auth()->user()->hasPermissionTo('view detail alumni'))
        <a href="{{route('alumnis.export_excel')}}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
        @endif

        @if(auth()->user()->hasPermissionTo('add alumni'))
        <div class="card-tools">
            <div class="">
                <a class="btn btn-success" href="{{ route('alumnis.create') }}"> Tambah data alumni</a>
            </div>
        </div>
        @endif
    </div>

    <!-- /.card-header -->
    <div class="card-body p-3">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Department</th>
                    <th>Pekerjaan</th>
                    @if(auth()->user()->hasAnyPermission(['view detail alumni', 'edit alumni', 'delete alumni']))
                    <th style="width: 280px">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnis as $alumni)
                <tr>
                    <td>{{ $alumni->name }}</td>
                    <td>{{ $alumni->department }}</td>
                    <td>{{ $alumni->job }}</td>
                    
                    @if(auth()->user()->hasAnyPermission(['view detail alumni', 'edit alumni', 'delete alumni']))
                    <td>
                        <div style="display: flex">
                            @if(auth()->user()->hasPermissionTo('view detail alumni'))
                            <div style="margin-right: 5px;">
                                <a class="btn btn-info" href="{{ route('alumnis.show',$alumni->id) }}"><i class="fa fa-eye"></i></a>
                            </div>
                            @endif

                            @if(auth()->user()->hasPermissionTo('edit alumni'))
                            <div style="margin-right: 5px;">
                                <a class="btn btn-primary" href="{{ route('alumnis.edit',$alumni->id) }}"><i class="fa fa-edit"></i></a>
                            </div>
                            @endif

                            @if(auth()->user()->hasPermissionTo('delete alumni'))
                            <div style="margin-right: 5px;">
                                <form action="{{ route('alumnis.destroy', $alumni->id) }}" method="POST" class="display: inline;">
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
    <script src="{{ asset('/AdminLTE-3.0.5/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/AdminLTE-3.0.5/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('/AdminLTE-3.0.5/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('/AdminLTE-3.0.5/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
      });
    </script>
@endpush
