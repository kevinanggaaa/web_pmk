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
                <h1>Ulang tahun PMK ITS</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Ulang tahun</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="card">
    <div class="card-header">
        <h3 class="pl-2 text-center">Ulang tahun bulan ini</h3>
    </div>
    <div class="card-body p-12">
        <table id="example0" class="table table-bordered table-striped">
            
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal lahir (yyyy-mm-dd)</th>
                    <th>Jurusan</th>
                    <th>Angkatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->birthdate }}</td>
                    @foreach ($user->profiles as $profile)
                        @if($profile->model_type == "App\Models\Student")
                            <td>{{ $profile->model->department }}</td>
                            <td>{{ $profile->model->year_entry }}</td>
                            @break
                        @endif
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card px-3">
    <div class="card-header">
        <h3 class="pl-2 text-center">Ulang tahun bulan depan</h3>
    </div>
    <div class="card-body p-12">
        <table id="example1" class="table table-bordered table-striped">
            
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal lahir (yyyy-mm-dd)</th>
                    <th>Jurusan</th>
                    <th>Angkatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users1 as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->birthdate }}</td>
                    @foreach ($user->profiles as $profile)
                        @if($profile->model_type == "App\Models\Student")
                            <td>{{ $profile->model->department }}</td>
                            <td>{{ $profile->model->year_entry }}</td>
                            @break
                        @endif
                    @endforeach
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
        $("#example0").DataTable({
            "responsive": true,
            "autoWidth": false,
            order:[[1,"asc"]],
        });
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            order:[[1,"asc"]],
        });
    });
</script>
@endpush