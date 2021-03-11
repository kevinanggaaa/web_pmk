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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Testimony</li>
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
                    <img class="profile-user-img img-fluid img-circle" src="{{ url('/landingpage/testimony/'.$testimony->image) }}" alt="Image Testimony">
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
                                    <td>Nama</td>
                                    <td>{{ $testimony->name }}</td>
                                </tr>
                                <tr>
                                    <td>Posisi</td>
                                    <td>{{ $testimony->position }}</td>
                                </tr>
                                <tr>
                                    <td>Quote</td>
                                    <td>{{ $testimony->quote }}</td>
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