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
                <h1>Edit user: {{$user->name}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">user</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
        <form role="form" method="POST" action="{{ route('users.updateAvatar', $user->id)  }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="avatar">Avatar</label>
                                    <input type="file" name="avatar" id="avatar" class="form-control" value="{{ $user->avatar }}">
                                    @error('avatar')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary swalDefaultInfo" value="Data user" id="data"><i class="fa fa-paper-plane"></i> Submit</button>
                    </div>
                </div>
            </form>
            <form role="form" method="POST" action="{{ route('users.update', $user->id)  }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" placeholder="Masukkan email" value="{{$user->email}}" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="password" name="password" placeholder="Masukkan password" value="{{$user->password}}" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Nama </label>
                                    <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" placeholder="Masukkan nama " value="{{$user->name}}" required>
                                    @error('name')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="pkk">Nrp PKK</label>
                                    <input type="text" class="form-control {{$errors->has('pkk') ? 'is-invalid' : ''}}" id="pkk" name="pkk" placeholder="Masukkan nrp PKK" value="{{$user->pkk}}" >
                                    @error('pkk')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="current_address">Alamat Saat Ini</label>
                                    <input type="text" class="form-control {{$errors->has('current_address') ? 'is-invalid' : ''}}" id="current_address" name="current_address" placeholder="Masukkan alamat mahasiswa" value="{{$user->address}}">
                                    @error('current_address')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="origin_address">Alamat Asal</label>
                                    <input type="text" class="form-control {{$errors->has('origin_address') ? 'is-invalid' : ''}}" id="origin_address" name="origin_address" placeholder="Masukkan alamat asal mahasiswa" value="{{$user->address_origin}}">
                                    @error('origin_address')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="avatar">Avatar</label>
                                    <input type="file" name="avatar" id="avatar" class="form-control" value="{{ $user->avatar }}">
                                    @error('avatar')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="phone">Nomor Telepon</label>
                                    <input type="text" name="phone" id="phone" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" value="{{$user->phone}}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="parent_phone">Nomor Telepon Orang tua / Wali</label>
                                    <input type="text" name="parent_phone" id="parent_phone" class="form-control {{$errors->has('parent_phone') ? 'is-invalid' : ''}}" value="{{$user->parent_phone}}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="line">Line</label>
                                    <input type="text" name="line" id="line" class="form-control {{$errors->has('line') ? 'is-invalid' : ''}}" value="{{$user->line}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="birthdate">Tanggal lahir</label>
                                    <input type="date" name="birthdate" id="birthdate" class="form-control {{$errors->has('birthdate') ? 'is-invalid' : ''}}" value="{{$user->birthdate}}" required>
                                    @error('birthdate')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <input type="text" name="gender" id="gender" class="form-control {{$errors->has('gender') ? 'is-invalid' : ''}}" value="{{$user->gender}}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="date_death">Tanggal Wafat</label>
                                    <input type="date" name="date_death" id="date_death" class="form-control {{$errors->has('date_death') ? 'is-invalid' : ''}}" value="{{$user->date_death}}">
                                    @error('date_death')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            @if(auth()->user()->hasRole('Super Admin'))
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Roles:</label>
                                    <select class="duallistbox" multiple="multiple" name="role_ids[]">
                                        @foreach($selected_roles as $role)
                                            <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                        @endforeach
                                        @foreach($unselected_roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary swalDefaultInfo" value="Data user" id="data"><i class="fa fa-paper-plane"></i> Submit</button>
                    </div>
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