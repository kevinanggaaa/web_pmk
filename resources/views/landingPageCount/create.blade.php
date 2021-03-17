@extends('adminlte.template')

@section('content')

@if ($message = Session::get('fail'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif

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
                <h1>Add New Landing Page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Jumlah</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <form role="form" method="POST" action="{{ route('landingPage.storeCount')  }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="students">Jumlah Mahasiswa</label>
                                <input type="text" class="form-control {{$errors->has('students') ? 'is-invalid' : ''}}" id="students" name="students" placeholder="Masukkan judul 1" value="{{old('students')}}" required>
                                @error('students')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="lecturers">Jumlah Dosen</label>
                                <input type="text" class="form-control {{$errors->has('lecturers') ? 'is-invalid' : ''}}" id="lecturers" name="lecturers" placeholder="Masukkan deskripsi 1" value="{{old('lecturers')}}" required>
                                @error('lecturers')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="alumnis">Jumlah Alumni</label>
                                <input type="text" class="form-control {{$errors->has('alumnis') ? 'is-invalid' : ''}}" id="alumnis" name="alumnis" placeholder="Masukkan judul 2" value="{{old('alumnis')}}" required>
                                @error('alumnis')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="events">Jumlah Event</label>
                                <input type="text" class="form-control {{$errors->has('events') ? 'is-invalid' : ''}}" id="events" name="events" placeholder="Masukkan deskripsi 2" value="{{old('events')}}" required>
                                @error('events')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class=" fa fa-paper-plane"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('/AdminLTE-3.0.5/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('/AdminLTE-3.0.5/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>

<script>
    $('.datemask').inputmask('yyyy', {
        'placeholder': 'yyyy'
    })
</script>
@endpush