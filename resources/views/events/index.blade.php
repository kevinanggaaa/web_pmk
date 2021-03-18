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

        @can('add event')
        <div class="card-tools">
            <div class="">
                <a class="btn btn-success" href="{{ route('events.create') }}"> Tambah data event</a>
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
                    <th>Acara</th>
                    <th>Tipe</th>
                    <th>Mulai</th>
                    <th>Berakhir</th>
                    @canany(['view detail event', 'edit event', 'delete event'])
                    <th style="width: 280px">Action</th>
                    @endcanany
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->type }}</td>
                    <td>{{ $event->start }}</td>
                    <td>{{ $event->end }}</td>

                    @canany(['view detail event', 'edit event', 'delete event'])
                    <td>
                        <div style="display: flex">
                            @can('view detail event')
                            <div style="margin-right: 5px;">
                                <a class="btn btn-info" href="{{ route('events.show',$event->id) }}"><i class="fa fa-eye"></i></a>
                            </div>
                            @endcan

                            @can('edit event')
                                @if($event->creator_id == $user->id)
                                <div style="margin-right: 5px;">
                                    <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}"><i class="fa fa-edit"></i></a>
                                </div>
                                @endif
                            @endcan

                            @can('delete event')
                            <div style="margin-right: 5px;">
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="display: inline;">
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
            columnDefs: [
            {   "targets": [0],
                "visible": false,
                "searchable": false
            },
            ],
            order:[[0,"desc"]],
        });
    });
</script>
@endpush