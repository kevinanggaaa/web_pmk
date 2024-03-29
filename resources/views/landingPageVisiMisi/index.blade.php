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
                    <li class="breadcrumb-item active">Visi Misi</li>
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

        @can('add visi misi')
        <div class="card-tools">
            <div class="">
                <a class="btn btn-success" href="{{ route('landingPage.createVisiMisi') }}"> Tambah visi misi</a>
            </div>
        </div>
        @endcan
    </div>

    <!-- /.card-header -->
    <div class="card-body p-0">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Judul 1</th>
                    <th>Judul 2</th>
                    <th>Judul 3</th>
                    <th>Dibuat pada</th>
                    @canany(['view detail visi misi', 'edit visi misi', 'delete visi misi'])
                    <th style="width: 280px">Action</th>
                    @endcanany
                </tr>
            </thead>
            <tbody>
                @foreach ($VisiMisis as $VisiMisi)
                <tr>
                    <td>{{ $VisiMisi->id }}</td>
                    <td>{{ $VisiMisi->title1 }}</td>
                    <td>{{ $VisiMisi->title2 }}</td>
                    <td>{{ $VisiMisi->title3 }}</td>
                    <td>{{ $VisiMisi->created_at }}</td>
                    
                    @canany(['view detail visi misi', 'edit visi misi', 'delete visi misi'])
                    <td>
                        <div style="display: flex">

                            @can('view detail visi misi')
                            <div style="margin-right: 5px;">
                                <a class="btn btn-info" href="{{ route('landingPage.showVisiMisi',$VisiMisi->id) }}"><i class="fa fa-eye"></i></a>
                            </div>
                            @endcan

                            @can('edit visi misi')
                            <div style="margin-right: 5px;">
                                <a class="btn btn-primary" href="{{ route('landingPage.editVisiMisi',$VisiMisi->id) }}"><i class="fa fa-edit"></i></a>
                            </div>
                            @endcan

                            @can('delete visi misi')
                            <div style="margin-right: 5px;">
                                <form action="{{ route('landingPage.deleteVisiMisi', $VisiMisi->id) }}" method="POST" class="display: inline;">
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
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            order:[[0,"desc"]]
        });
    });
</script>
@endpush