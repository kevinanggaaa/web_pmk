@extends('adminlte.template')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mahasiswa PMK ITS</h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Mahasiswa</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-md-3">

        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ url('/avatar/'.$user->avatar) }}" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{$student->name}}</h3>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>

    <div class="col-md-9">

        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#data-diri" data-toggle="tab">Data
                            Diri</a>
                    </li>

                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">

                    <div class="active tab-pane" id="data-diri">

                        <table class="table">

                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ $student->name }}</td>
                                </tr>
                                <tr>
                                    <td>NRP</td>
                                    <td>{{ $student->nrp }}</td>
                                </tr>
                                <tr>
                                    <td>Department</td>
                                    <td>{{ $student->department }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun masuk</td>
                                    <td>{{ $student->year_entry }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun lulus</td>
                                    <td>{{ $student->year_graduate }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>PKK</td>
                                    <td>{{ $user->pkk }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $user->address }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat asal</td>
                                    <td>{{ $user->address_origin }}</td>
                                </tr>
                                <tr>
                                    <td>No telp</td>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <td>No telp ortu</td>
                                    <td>{{ $user->parent_phone }}</td>
                                </tr>
                                <tr>
                                    <td>Id line</td>
                                    <td>{{ $user->line }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal lahir</td>
                                    <td>{{ $user->birthdate }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis kelamin</td>
                                    <td>{{ $user->gender }}</td>
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