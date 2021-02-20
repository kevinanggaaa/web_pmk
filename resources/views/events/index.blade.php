@extends('adminlte.template')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

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

        @if(auth()->user()->hasPermissionTo('add event'))
        <div class="card-tools">
            <div class="">
                <a class="btn btn-success" href="{{ route('events.create') }}"> Tambah data event</a>
            </div>
        </div>
        @endif
    </div>

    <!-- /.card-header -->
    <div class="card-body p-0">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="">Acara</th>
                    <th>Tipe</th>
                    <th>Mulai</th>
                    <th>Berakhir</th>
                    @if(auth()->user()->hasAnyPermission(['view detail event', 'edit event', 'delete event']))
                    <th style="width: 280px">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->type }}</td>
                    <td>{{ $event->start }}</td>
                    <td>{{ $event->end }}</td>

                    @if(auth()->user()->hasAnyPermission(['view detail event', 'edit event', 'delete event']))
                    <td>
                        <div style="display: flex">
                            @if(auth()->user()->hasPermissionTo('view detail event'))
                            <div style="margin-right: 5px;">
                                <a class="btn btn-info" href="{{ route('events.show',$event->id) }}"><i class="fa fa-eye"></i></a>
                            </div>
                            @endif

                            @if(auth()->user()->hasPermissionTo('edit event'))
                                @if($event->creator_id == $user->id)
                                <div style="margin-right: 5px;">
                                    <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}"><i class="fa fa-edit"></i></a>
                                </div>
                                @endif
                            @endif

                            @if($event->attendant_id == null)
                            @php($absen = 1)
                            @foreach ($attends as $attend)
                            <?php
                            if ($attend->event_id != $event->id) {
                                $absen = 1;
                            } elseif ($attend->event_id == $event->id) {
                                $absen = 2;
                                break;
                            }
                            ?>
                            @endforeach
                            @if($absen == 2)
                            <div style="margin-right: 5px;">
                                <a class="btn btn-secondary" href="" onclick="return false;"><i class="fa fa-user-check"></i></a>
                            </div>
                            @elseif($absen == 1)
                            <div style="margin-right: 5px;">
                                <a class="btn btn-primary" href="{{ route('events.showAttend',$event->id) }}"><i class="fa fa-user"></i></a>
                            </div>
                            @endif
                            @endif

                            @if(auth()->user()->hasPermissionTo('delete event'))
                            <div style="margin-right: 5px;">
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger deleteData"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection

@push('scripts')
<!-- Datatables -->
<script src="{{ asset('/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endpush