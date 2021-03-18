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
                    <li class="breadcrumb-item active">Visi Misi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-md-12">

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
                                    <td>Judul 1</td>
                                    <td>{{ $VisiMisi->title1 }}</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi 1</td>
                                    <td>{{ $VisiMisi->description1 }}</td>
                                </tr>
                                <tr>
                                    <td>Judul 2</td>
                                    <td>{{ $VisiMisi->title2 }}</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi 2</td>
                                    <td>{{ $VisiMisi->description2 }}</td>
                                </tr>
                                <tr>
                                    <td>Judul 3</td>
                                    <td>{{ $VisiMisi->title3 }}</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi 3</td>
                                    <td>{{ $VisiMisi->description3 }}</td>
                                </tr>
                                <tr>
                                    <td>Judul</td>
                                    <td>{{ $VisiMisi->judul }}</td>
                                </tr>
                                <tr>
                                    <td>Sub Judul</td>
                                    <td>{{ $VisiMisi->subjudul }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal buat</td>
                                    <td>{{ $VisiMisi->created_at }}</td>
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