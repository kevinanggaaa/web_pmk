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

<div class="alert alert-danger">
    <p>Data alumni gagal ditambahkan karena terdapat duplikasi pada email</p>
</div>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add New Alumni</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Alumni</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <form role="form" method="POST" action="{{ route('alumnis.store')  }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" placeholder="Masukkan email" value="{{$request->email}}" required>
                                @error('email')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}" id="address" name="address" placeholder="Masukkan alamat" value="{{$request->address}}" >
                                @error('address')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="address_origin">Alamat Asal</label>
                                <input type="text" class="form-control {{$errors->has('address_origin') ? 'is-invalid' : ''}}" id="address_origin" name="address_origin" placeholder="Masukkan alamat asal" value="{{$request->address_origin}}" required>
                                @error('address_origin')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="phone">No telp</label>
                                <input type="text" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" id="phone" name="phone" placeholder="Masukkan no telp" value="{{$request->phone}}" required>
                                @error('phone')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="parent_phone">No telp ortu</label>
                                <input type="text" class="form-control {{$errors->has('parent_phone') ? 'is-invalid' : ''}}" id="parent_phone" name="parent_phone" placeholder="Masukkan no telp orang tua" value="{{$request->parent_phone}}" required>
                                @error('parent_phone')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="line">Id line</label>
                                <input type="text" class="form-control {{$errors->has('line') ? 'is-invalid' : ''}}" id="line" name="line" placeholder="Masukkan line mahasiswa" value="{{$request->line}}" >
                                @error('line')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="birthdate">Tanggal lahir</label>
                                <input type="date" class="form-control {{$errors->has('birthdate') ? 'is-invalid' : ''}}" id="birthdate" name="birthdate" placeholder="Masukkan tanggal lahir" value="{{$request->birthdate}}" required>
                                @error('birthdate')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" name="avatar" id="avatar" class="form-control " value="{{$request->avatar}}">
                                @error('avatar')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="pkk">PKK</label>
                                <input type="text" class="form-control {{$errors->has('pkk') ? 'is-invalid' : ''}}" id="pkk" name="pkk" placeholder="Masukkan PKK" value="{{$request->pkk}}" >
                                @error('pkk')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Nama Alumni</label>
                                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" placeholder="Masukkan Nama Alumni" value="{{$request->name}}" required>
                                @error('name')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="department">Department</label>
                                <input type="text" name="department" id="department" class="form-control {{$errors->has('department') ? 'is-invalid' : ''}}" placeholder="Masukkan Nama Department" value="{{$request->department}}" required>
                                @error('department')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="job">Pekerjaan</label>
                                <input type="text" name="job" id="job" class="form-control {{$errors->has('job') ? 'is-invalid' : ''}}" placeholder="Masukkan Nama Pekerjaan" value="{{$request->job}}" required>
                                @error('job')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="angkatan">Angkatan</label>
                                <input type="text" name="angkatan" id="angkatan" class="form-control {{$errors->has('angkatan') ? 'is-invalid' : ''}}" placeholder="Masukkan angkatan" value="{{$request->angkatan}}" required>
                                @error('angkatan')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
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
<script src="{{asset('/AdminLTE-3.0.5/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('/AdminLTE-3.0.5/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>

<script>
    $('.datemask').inputmask('yyyy', {
        'placeholder': 'yyyy'
    })
</script>
@endpush