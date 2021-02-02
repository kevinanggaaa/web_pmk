@extends('adminlte.template')

@section('content')
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

<div class="row">
    <div class="col-md-3">

        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <!-- Akses nama dan gambar setelah autentifikasi -->
                <!-- <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ url('/avatar_mahasiswa/'.$student->avatar) }}" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{$student->name}}</h3> -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>

    <div class="col-md-9">

        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#data-diri" data-toggle="tab">Data Organisasi</a>
                    </li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">

                    <div class="active tab-pane" id="data-diri">

                        <table class="table">

                            <tbody>
                                <tr>
                                    <td>Posisi</td>
                                    <td>{{ $organizationalRecord->position }}</td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>{{ $organizationalRecord->category }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun masuk</td>
                                    <td>{{ $organizationalRecord->year_entry }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun selesai</td>
                                    <td>{{ $organizationalRecord->year_end }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.tab-pane -->


                </div>
                <!-- /.tab-content -->

                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->

</div>
@endsection