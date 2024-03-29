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
                <h1>Add New Event</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Event</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <form role="form" method="POST" action="{{ route('events.store')  }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title">Nama Acara</label>
                                <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" id="title" name="title" placeholder="Masukkan Nama Acara" value="{{old('title')}}" required>
                                @error('title')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <input type="text" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" id="description" name="description" placeholder="Masukkan Deskripsi Acara" value="{{old('description')}}" required>
                                @error('description')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="speaker">Pembicara</label>
                                <input type="text" class="form-control {{$errors->has('speaker') ? 'is-invalid' : ''}}" id="speaker" name="speaker" placeholder="Masukkan Nama Pembicara" value="{{old('speaker')}}">
                                @error('speaker')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="location">Lokasi</label>
                                <input type="text" class="form-control {{$errors->has('location') ? 'is-invalid' : ''}}" id="location" name="location" placeholder="Masukkan Lokasi Acara" value="{{old('location')}}" required>
                                @error('location')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="link" class="form-control {{$errors->has('link') ? 'is-invalid' : ''}}" id="link" name="link" placeholder="Masukkan Link Video" value="{{old('link')}}">
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
                                        <option value="PJ">Persekutuan Jumat</option>
                                        <option value="Camp">Camp</option>
                                        <option value="Paskah">Paskah</option>
                                        <option value="Natal">Natal</option>
                                        <option value="LPJ">Laporan Pertanggungjawaban</option>
                                        <option value="PraRaker">Pra Rapat Kerja</option>
                                        <option value="Raker">Rapat Kerja</option>
                                        <option value="Student">Mahasiswa</option>
                                        <option value="Lecturer">Dosen</option>
                                        <option value="Alumni">Alumni</option>
                                </select>
                                @error('type')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- Date and time range -->
                            <div class="form-group">
                                <label for="reservationtime">Date and time range:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                    <input type="text" class="form-control float-right" name="reservationtime" id="reservationtime" required>
                                    @error('reservationtime')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="image">Gambar</label>
                                <input type="file" name="image" id="image" class="form-control " value="{{old('image')}}">
                                @error('image')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class=" fa fa-paper-plane"></i>Submit</button>
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
            format: 'MM/DD/YYYY hh:mm A'
        }
    })
</script>

{{-- <script>--}}
{{-- function doSomething(e){--}}
{{-- alert(e.target.value);--}}

{{-- }--}}
{{-- var $el = $('#reservationtime');--}}
{{-- $el.on('change', doSomething);--}}
{{-- </script>--}}

<script>
    $('.datemask').inputmask('yyyy', {
        'placeholder': 'yyyy'
    })
</script>

@endpush