@extends('adminlte.template')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Landing Page PMK ITS</h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">About</li>
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
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>

    <div class="col-md-9">

        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#data-diri" data-toggle="tab">Keterangan</a>
                    </li>

                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">

                    <div class="active tab-pane" id="data-diri">

                        <table class="table">

                            <tbody>
                                <tr>
                                    <td>Judul</td>
                                    <td>{{ $about->title }}</td>
                                </tr>
                                <tr>
                                    <td>Sub judul</td>
                                    <td>{{ $about->subtitle }}</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>{{ $about->description }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal buat</td>
                                    <td>{{ $about->created_at }}</td>
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