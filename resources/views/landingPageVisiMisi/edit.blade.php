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

@if ($message = Session::get('fail'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Landing Page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Landing Page</a></li>
                    <li class="breadcrumb-item active">Visi Misi</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <form role="form" method="POST" action="{{ route('landingPage.updateVisiMisi', $VisiMisi->id)  }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title1">Judul 1</label>
                                <input type="text" class="form-control {{$errors->has('title1') ? 'is-invalid' : ''}}" id="title1" name="title1" placeholder="Masukkan judul 1" value="{{$VisiMisi->title1}}" required>
                                @error('title1')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="description1">Deskripsi 1</label>
                                <input type="text" class="form-control {{$errors->has('description1') ? 'is-invalid' : ''}}" id="description1" name="description1" placeholder="Masukkan deskripsi 1" value="{{$VisiMisi->description1}}" required>
                                @error('description1')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title2">Judul 2</label>
                                <input type="text" class="form-control {{$errors->has('title2') ? 'is-invalid' : ''}}" id="title2" name="title2" placeholder="Masukkan judul 2" value="{{$VisiMisi->title2}}" required>
                                @error('title2')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="description2">Deskripsi 2</label>
                                <input type="text" class="form-control {{$errors->has('description2') ? 'is-invalid' : ''}}" id="description2" name="description2" placeholder="Masukkan deskripsi 2" value="{{$VisiMisi->description2}}" required>
                                @error('description2')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title3">Judul 3</label>
                                <input type="text" class="form-control {{$errors->has('title3') ? 'is-invalid' : ''}}" id="title3" name="title3" placeholder="Masukkan judul 3" value="{{$VisiMisi->title3}}" required>
                                @error('title3')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="description3">Deskripsi 3</label>
                                <input type="text" class="form-control {{$errors->has('description3') ? 'is-invalid' : ''}}" id="description3" name="description3" placeholder="Masukkan deskripsi 3" value="{{$VisiMisi->description3}}" required>
                                @error('description3')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control {{$errors->has('judul') ? 'is-invalid' : ''}}" id="judul" name="judul" placeholder="Masukkan judul" value="{{$VisiMisi->judul}}" required>
                                @error('judul')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="subjudul">Sub judul</label>
                                <input type="text" class="form-control {{$errors->has('subjudul') ? 'is-invalid' : ''}}" id="subjudul" name="subjudul" placeholder="Masukkan sub judul" value="{{$VisiMisi->subjudul}}" required>
                                @error('subjudul')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary swalDefaultInfo" value="Data Mahasiswa" id="data"><i class="fa fa-paper-plane"></i> Submit</button>
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