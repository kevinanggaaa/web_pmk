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
                <h1>Add New Student</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Mahasiswa</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <form role="form" method="POST" action="{{ route('students.store')  }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Nama Mahasiswa</label>
                                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" placeholder="Masukkan nama mahasiswa" value="{{old('name')}}" required>
                                @error('name')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="nrp">NRP</label>
                                <input type="text" class="form-control {{$errors->has('nrp') ? 'is-invalid' : ''}}" id="nrp" name="nrp" placeholder="Masukkan NRP mahasiswa" value="{{old('nrp')}}" required>
                                @error('nrp')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
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
                                <label for="avatar">Avatar</label>
                                <input type="file" name="avatar" id="avatar" class="form-control " value="{{old('avatar')}}">
                                @error('avatar')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="department">Department</label>
                                <input type="text" class="form-control {{$errors->has('department') ? 'is-invalid' : ''}}" id="department" name="department" placeholder="Masukkan department mahasiswa" value="{{old('department')}}" required>
                                @error('department')
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
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}" id="address" name="address" placeholder="Masukkan alamat" value="{{old('address')}}" >
                                @error('address')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="address_origin">Alamat Asal</label>
                                <input type="text" class="form-control {{$errors->has('address_origin') ? 'is-invalid' : ''}}" id="address_origin" name="address_origin" placeholder="Masukkan alamat asal" value="{{old('address_origin')}}" required>
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
                                <label for="parent_phone">No telp ortu</label>
                                <input type="text" class="form-control {{$errors->has('parent_phone') ? 'is-invalid' : ''}}" id="parent_phone" name="parent_phone" placeholder="Masukkan no telp orang tua" value="{{old('parent_phone')}}" required>
                                @error('parent_phone')
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
                                <label for="pkk">PKK</label>
                                <input type="text" class="form-control {{$errors->has('pkk') ? 'is-invalid' : ''}}" id="pkk" name="pkk" placeholder="Masukkan PKK" value="{{old('pkk')}}" >
                                @error('pkk')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label for="year_entry">Tahun Masuk</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input name="year_entry" id="year_entry" type="text" class="datemask form-control {{$errors->has('year_entry') ? 'is-invalid' : ''}}" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask value="{{old('year_entry')}}" required>
                                    @error('year_entry')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
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