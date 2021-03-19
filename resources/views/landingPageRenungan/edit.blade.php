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
                    <li class="breadcrumb-item">Renungan</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <form role="form" method="POST" action="{{ route('landingPage.updateRenunganAvatar', $renungan->id)  }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="image">Gambar</label>
                                <input type="file" name="image" id="image" class="form-control" value="{{ $renungan->image }}" required>
                                @error('image')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary swalDefaultInfo" value="Data user" id="data"><i class="fa fa-paper-plane"></i> Submit</button>
                </div>
            </form>
        </div>
        <div class="card card-primary">
            <form role="form" method="POST" action="{{ route('landingPage.updateRenungan', $renungan->id)  }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" id="title" name="title" placeholder="Masukkan judul" value="{{$renungan->title}}" required>
                                @error('title')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="lokasiFirman">Lokasi Firman</label>
                                <input type="text" class="form-control {{$errors->has('lokasiFirman') ? 'is-invalid' : ''}}" id="lokasiFirman" name="lokasiFirman" placeholder="Masukkan lokasi firman" value="{{$renungan->lokasiFirman}}" required>
                                @error('lokasiFirman')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="isiFirman">Isi Firman</label>
                                <input type="text" class="form-control {{$errors->has('isiFirman') ? 'is-invalid' : ''}}" id="isiFirman" name="isiFirman" placeholder="Masukkan isi firman" value="{{$renungan->isiFirman}}" required>
                                @error('isiFirman')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="bacaan">Bacaan</label>
                                <input type="text" class="form-control {{$errors->has('bacaan') ? 'is-invalid' : ''}}" id="bacaan" name="bacaan" placeholder="Masukkan bacaan" value="{{$renungan->bacaan}}" required>
                                @error('bacaan')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal renungan</label>
                                <input type="date" class="form-control {{$errors->has('tanggal') ? 'is-invalid' : ''}}" id="tanggal" name="tanggal" placeholder="Masukkan tanggal lahir" value="{{$renungan->tanggal}}" required>
                                @error('tanggal')
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