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
                    <li class="nav-item"><a class="nav-link" href="#peserta" data-toggle="tab">Peserta</a>
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
                                    <td>Pembicara</td>
                                    <td>{{$event->speaker}}</td>
                                </tr>
                                <tr>
                                    <td>Lokasi</td>
                                    <td>{{$event->location}}</td>
                                </tr>
                                <tr>
                                    <td>Link</td>
                                    <td>{{$event->link}}</td>
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
                                    <td>Jumlah Peserta</td>
                                    <td>{{$event->attendant_count}}</td>
                                </tr>
                                <tr>
                                    <td>Report</td>
                                    <td>{{$event->report}}</td>
                                </tr>
                                <tr>
                                    <td>ID Creator</td>
                                    <td>{{$event->creator_id}}</td>
                                </tr>
                                <tr>
                                    <td>Tipe Creator</td>
                                    <td>{{$event->creator_type}}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="peserta">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($event->attendant_id != "")
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                @endforeach
                                @endif
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