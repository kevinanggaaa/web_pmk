@extends('adminlte.template')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Event PMK ITS</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Event</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#informasi" data-toggle="tab">Informasi</a>
                    </li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="informasi">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nama Acara</td>
                                    <td>{{$event->title}}</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>{{$event->description}}</td>
                                </tr>
                                <tr>
                                    <td>Tipe</td>
                                    <td>{{$event->type}}</td>
                                </tr>
                                <tr>
                                    <td>Waktu Mulai</td>
                                    <td>{{$event->start}}</td>
                                </tr>
                                <tr>
                                    <td>Waktu Akhir</td>
                                    <td>{{$event->end}}</td>
                                </tr>
                                <tr>
                                    <td>Report</td>
                                    <td>{{$event->report}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div style="margin-right: 5px;">
                            <form role="form" method="POST" action="{{ route('users-events.store')  }}">
                                @csrf
                                <input type="hidden" id="id" name="id" value="{{$event->id}}">

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"><i class=" fa fa-user"></i>Attend</button>
                                </div>
                            </form>
                        </div>
                    </div>
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