@extends('adminlte.template')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Event: {{$event->title}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Event</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <form role="form" method="POST" action="{{ route('events.update', $event->id)  }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title">Nama Acara</label>
                                <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" id="title" name="title" placeholder="Masukkan Nama Acara" value="{{$event->title}}" required>
                                @error('title')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <input type="text" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" id="description" name="description" placeholder="Masukkan Deskripsi Acara" value="{{$event->description}}" required>
                                @error('description')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" name="type" id="type" class="form-control {{$errors->has('type') ? 'is-invalid' : ''}}" placeholder="Masukkan Tipe Acara" value="{{$event->type}}" required>
                                @error('type')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <!-- Date and time range -->
                            <div class="form-group">
                                <label for="reservationtime">Date and time range:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                    <input type="text" class="form-control float-right" name="reservationtime" id="reservationtime" value="{{$event->start}} - {{$event->end}}">
                                    @error('reservationtime')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="report">Report</label>
                                <input type="text" class="form-control {{$errors->has('report') ? 'is-invalid' : ''}}" id="report" name="report" placeholder="Masukkan report Acara" value="{{$event->report}}">
                                @error('report')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
                    @if($event->attendant_id == null)
                    <div style="margin-right: 5px; display: inline;">
                        <a class="btn btn-secondary" href="{{ route('events.finnish',$event->id) }}"><i class="fa fa-flag"> finnish</i></a>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="{{ asset('/AdminLTE-3.0.5/plugins/moment/moment.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{ asset('/AdminLTE-3.0.5/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script>
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'YYYY-MM-DD HH:mm'
        }
    })
</script>
@endpush