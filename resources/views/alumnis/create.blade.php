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
                <h1>Add New Alumni</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    
                    <li class="breadcrumb-item">Alumni</li>
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
                                <label for="name">Nama Alumni</label>
                                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" placeholder="Masukkan Nama Alumni" value="{{old('name')}}" required>
                                @error('name')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" placeholder="Masukkan email" value="{{old('email')}}" required>
                                @error('email')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="address_origin">Alamat</label>
                                <input type="text" class="form-control {{$errors->has('address_origin') ? 'is-invalid' : ''}}" id="address_origin" name="address_origin" placeholder="Masukkan alamat" value="{{old('address_origin')}}" required>
                                @error('address_origin')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="phone">No telp</label>
                                <input type="text" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" id="phone" name="phone" placeholder="Masukkan no telp" value="{{old('phone')}}" required>
                                @error('phone')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="line">Id line</label>
                                <input type="text" class="form-control {{$errors->has('line') ? 'is-invalid' : ''}}" id="line" name="line" placeholder="Masukkan line mahasiswa" value="{{old('line')}}" >
                                @error('line')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="birthdate">Tanggal lahir</label>
                                <input type="date" class="form-control {{$errors->has('birthdate') ? 'is-invalid' : ''}}" id="birthdate" name="birthdate" placeholder="Masukkan tanggal lahir" value="{{old('birthdate')}}" required>
                                @error('birthdate')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" name="avatar" id="avatar" class="form-control " value="{{old('avatar')}}">
                                @error('avatar')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="department">Department</label>
                                <input type="text" name="department" id="department" class="form-control {{$errors->has('department') ? 'is-invalid' : ''}}" placeholder="Masukkan Nama Department" value="{{old('department')}}" required>
                                @error('department')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="job">Pekerjaan</label>
                                <input type="text" name="job" id="job" class="form-control {{$errors->has('job') ? 'is-invalid' : ''}}" placeholder="Masukkan Nama Pekerjaan" value="{{old('job')}}">
                                @error('job')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="angkatan">Angkatan</label>
                                <input type="text" name="angkatan" id="angkatan" class="form-control {{$errors->has('angkatan') ? 'is-invalid' : ''}}" placeholder="Masukkan angkatan" value="{{old('angkatan')}}" required>
                                @error('angkatan')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-control {{$errors->has('gender') ? 'is-invalid' : ''}}" required>
                                <option value="">== Pilih Type ==</option>
                                        <option value="P" <?php if(old('gender')=="P") echo 'selected="selected"'; ?>>Perempuan</option>
                                        <option value="L" <?php if(old('gender')=="L") echo 'selected="selected"'; ?>>Laki-Laki</option>
                                </select>
                                @error('gender')
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