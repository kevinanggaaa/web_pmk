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
                    <li class="breadcrumb-item">Event</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <form role="form" method="POST" action="{{ route('events.updateImage', $event->id)  }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control" value="{{ $event->image }}">
                                @error('image')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary swalDefaultInfo" value="Data event" id="data"><i class="fa fa-paper-plane"></i>Upload</button>
                </div>
            </form>
        </div>
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
                                <label for="speaker">Pembicara</label>
                                <input type="text" class="form-control {{$errors->has('speaker') ? 'is-invalid' : ''}}" id="speaker" name="speaker" placeholder="Masukkan Deskripsi Acara" value="{{$event->speaker}}">
                                @error('speaker')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="location">Lokasi</label>
                                <input type="text" class="form-control {{$errors->has('location') ? 'is-invalid' : ''}}" id="location" name="location" placeholder="Masukkan Lokasi Acara" value="{{$event->location}}">
                                @error('location')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" class="form-control {{$errors->has('link') ? 'is-invalid' : ''}}" id="link" name="link" placeholder="Masukkan Link Video" value="{{$event->link}}">
                                @error('link')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control {{$errors->has('type') ? 'is-invalid' : ''}}" required>
                                    <option value="">== Pilih Type ==</option>
                                        <option value="PJ" <?php if($event->type=="PJ") echo 'selected="selected"'; ?>>Persekutuan Jumat</option>
                                        <option value="Camp" <?php if($event->type=="Camp") echo 'selected="selected"'; ?>>Camp</option>
                                        <option value="Paskah" <?php if($event->type=="Paskah") echo 'selected="selected"'; ?>>Paskah</option>
                                        <option value="Natal" <?php if($event->type=="Natal") echo 'selected="selected"'; ?>>Natal</option>
                                        <option value="LPJ" <?php if($event->type=="LPJ") echo 'selected="selected"'; ?>>Laporan Pertanggungjawaban</option>
                                        <option value="praRaker" <?php if($event->type=="praRaker") echo 'selected="selected"'; ?>>Pra Rapat Kerja</option>
                                        <option value="Raker" <?php if($event->type=="Raker") echo 'selected="selected"'; ?>>Rapat Kerja</option>
                                        <option value="Student" <?php if($event->type=="Student") echo 'selected="selected"'; ?>>Mahasiswa</option>
                                        <option value="Lecturer" <?php if($event->type=="Lecturer") echo 'selected="selected"'; ?>>Dosen</option>
                                        <option value="Alumni"<?php if($event->type=="Alumni") echo 'selected="selected"'; ?>>Alumni</option>
                                </select>
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