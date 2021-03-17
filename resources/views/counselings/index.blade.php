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
                <h1>Konseling PMK ITS</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Konseling</li>
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

        @can('add counseling')
        <div class="card-tools">
            <div class="">
                <a class="btn btn-success" href="{{ route('counselings.create') }}"> Tambah data Counseling</a>
            </div>
        </div>
        @endcan
    </div>

    <!-- /.card-header -->
    <div class="card-body p-0">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Topik</th>
                    <th>Konselor</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    @canany(['edit counseling', 'delete counseling', 'view detail counseling'])
                    <th style="width: 280px">Action</th>
                    @endcanany
                </tr>
            </thead>
            <tbody>
                @foreach ($counselings as $counseling)
                <tr>
                    <td>{{ $counseling->topic }}</td>
                    @foreach ($counselors as $counselor)
                        @if ($counselor->id == $counseling->counselor_id)
                        <td>{{ $counselor->name }}</td>
                        @endif
                    @endforeach
                    <td>{{ $counseling->date_time}}</td>
                    <td>{{ $counseling->status}}</td>

                    @canany(['edit counseling', 'delete counseling', 'view detail counseling'])
                    <td>
                        <div style="display: flex">
                            @can('view detail counseling')
                            <div style="margin-right: 5px;">
                                <a class="btn btn-info" href="{{ route('counselings.show',$counseling->id) }}"><i class="fa fa-eye"></i></a>
                            </div>
                            @endcan
                            @can('edit counseling')
                            <div style="margin-right: 5px;">
                                <a class="btn btn-primary" href="{{ route('counselings.edit',$counseling->id) }}"><i class="fa fa-edit"></i></a>
                            </div>
                            @endcan

                            @can('delete counseling')
                            <div style="margin-right: 5px;">
                                <form action="{{ route('counselings.destroy', $counseling->id) }}" method="POST" class="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger deleteData"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                            @endcan
                        </div>
                    </td>
                    @endcanany
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
