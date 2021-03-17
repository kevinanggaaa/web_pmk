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
                                <label for="name">Nama </label>
                                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" placeholder="Masukkan nama " value="{{old('name')}}" required>
                                @error('name')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="pkk">Nama PKK</label>
                                <input type="text" class="form-control {{$errors->has('pkk') ? 'is-invalid' : ''}}" id="pkk" name="pkk" placeholder="Masukkan nama PKK" value="{{old('pkk')}}" required>
                                @error('pkk')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="address">Alamat Saat Ini</label>
                                <input type="text" class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}" id="address" name="address" placeholder="Masukkan alamat" value="{{old('address')}}">
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
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="phone">Nomor Telepon</label>
                                <input type="text" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" name="phone" id="phone" class="form-control" placeholder="Masukkan Nomor Telepon" value="{{old('phone')}}" required>
                                @error('phone')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="parent_phone">Nomor Telepon Orang tua / Wali</label>
                                <input type="text" class="form-control {{$errors->has('parent_phone') ? 'is-invalid' : ''}}" name="parent_phone" id="parent_phone" class="form-control" placeholder="Masukkan Nomor Telepon Orang Tua" value="{{old('parent_phone')}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="line">Line</label>
                                <input type="text" class="form-control {{$errors->has('line') ? 'is-invalid' : ''}}" name="line" id="line" class="form-control" placeholder="Masukkan ID Line" value="{{old('line')}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="birthdate">Tanggal lahir</label>
                                <input type="date" name="birthdate" id="birthdate" class="form-control {{$errors->has('birthdate') ? 'is-invalid' : ''}}" value="{{old('birthdate')}}" required>
                                @error('birthdate')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        @role('admin')
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="death_date">Tanggal Wafat</label>
                                <input type="date" name="death_date" id="death_date" class="form-control {{$errors->has('death_date') ? 'is-invalid' : ''}}" value="{{old('death_date')}}">
                                @error('death_date')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        @endrole
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-control {{$errors->has('gender') ? 'is-invalid' : ''}}" required>
                                <option value="">== Pilih Type ==</option>
                                        <option value="P">Perempuan</option>
                                        <option value="L">Laki-Laki</option>
                                </select>
                                @error('gender')
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
<!-- <script src="{{asset('/AdminLTE-3.0.5/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('/AdminLTE-3.0.5/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script> -->

<!-- <script>
    $('.datemask').inputmask('yyyy', {
        'placeholder': 'yyyy'
    })
</script> -->

<script src="{{ asset('/AdminLTE-3.0.5/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.js')}}"></script>

<script>
    $duallistbox = $('.duallistbox');
    
    $duallistbox.bootstrapDualListbox({
        nonSelectedListLabel: 'Available Roles',
        selectedListLabel: 'Chosen Roles',
        moveOnSelect: false,
        moveAllLabel: 'aaa'
    });
    $(function () {
        var dualListContainer = $('select[name="role_ids[]"]').bootstrapDualListbox('getContainer');
        dualListContainer.find('.moveall i').removeClass().addClass('fa fa-arrow-right');
        dualListContainer.find('.removeall i').removeClass().addClass('fa fa-arrow-left');
        dualListContainer.find('.move i').removeClass().addClass('fa fa-arrow-right');
        dualListContainer.find('.remove i').removeClass().addClass('fa fa-arrow-left');
    });
</script>
@endpush