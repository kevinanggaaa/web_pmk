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
                    <li class="breadcrumb-item">About</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <form role="form" method="POST" action="{{ route('landingPage.storeAbout')  }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" id="title" name="title" placeholder="Masukkan judul" value="{{old('title')}}" required>
                                @error('title')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="subtitle">Sub Judul</label>
                                <input type="text" class="form-control {{$errors->has('subtitle') ? 'is-invalid' : ''}}" id="subtitle" name="subtitle" placeholder="Masukkan sub judul" value="{{old('subtitle')}}" required>
                                @error('subtitle')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <input type="text" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" id="description" name="description" placeholder="Masukkan deskripsi" value="{{old('description')}}" required>
                                @error('description')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
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