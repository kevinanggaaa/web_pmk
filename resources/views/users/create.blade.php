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
                <h1>Add New User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <form role="form" method="POST" action="{{ route('users.store')  }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Nama Mahasiswa</label>
                                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" placeholder="Masukkan nama mahasiswa" value="{{old('name')}}" required>
                                @error('name')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="pkk">Nrp PKK</label>
                                <input type="text" class="form-control {{$errors->has('pkk') ? 'is-invalid' : ''}}" id="pkk" name="pkk" placeholder="Masukkan nrp PKK" value="{{old('pkk')}}" required>
                                @error('pkk')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="current_address">Alamat Saat Ini</label>
                                <input type="text" class="form-control {{$errors->has('current_address') ? 'is-invalid' : ''}}" id="current_address" name="current_address" placeholder="Masukkan alamat mahasiswa" value="{{old('current_address')}}">
                                @error('current_address')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="origin_address">Alamat Asal</label>
                                <input type="text" class="form-control {{$errors->has('origin_address') ? 'is-invalid' : ''}}" id="origin_address" name="origin_address" placeholder="Masukkan alamat asal mahasiswa" value="{{old('origin_address')}}">
                                @error('origin_address')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="phone">Nomor Telepon</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone')}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="parent_phone">Nomor Telepon Orang tua / Wali</label>
                                <input type="text" name="parent_phone" id="parent_phone" class="form-control" value="{{old('parent_phone')}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="line">Line</label>
                                <input type="text" name="line" id="line" class="form-control" value="{{old('line')}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="birthdate">Tanggal lahir</label>
                                <input type="date" name="birthdate" id="birthdate" class="form-control {{$errors->has('birthdate') ? 'is-invalid' : ''}}" value="{{old('birthdate')}}">
                                @error('birthdate')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="death_date">Tanggal Wafat</label>
                                <input type="date" name="death_date" id="death_date" class="form-control {{$errors->has('death_date') ? 'is-invalid' : ''}}" value="{{old('death_date')}}">
                                @error('death_date')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <input type="text" name="gender" id="gender" class="form-control" value="{{old('gender')}}">
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
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Roles:</label>
                                <select class="duallistbox" multiple="multiple" name="role_ids[]">
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form-group -->
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

<script src="{{ asset('/AdminLTE-3.0.5/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.js')}}"></script>
<script>
    $duallistbox = $('.duallistbox')
    $duallistbox.bootstrapDualListbox({
        nonSelectedListLabel: 'Available Roles',
        selectedListLabel: 'Chosen Roles',
        moveOnSelect: false,
        moveAllLabel: 'aaa'
    });
</script>
@endpush