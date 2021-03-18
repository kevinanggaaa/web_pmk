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
                <h1>Edit Organisasi: {{$organizationalRecord->name}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Organisasi</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <form role="form" method="POST" action="{{ route('organizational-records.update', $organizationalRecord->id)  }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                    <select id="name" name="name" class="form-control select2-single" required>
                                        <option>== Pilih Nama ==</option>
                                        @foreach ($users as $user)
                                            <option value= {{ $user->id }} <?php if($organizationalRecord->user_id == $user->id) echo 'selected="selected"'; ?>>{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                @error('name')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="position">Posisi</label>
                                <input type="text" class="form-control {{$errors->has('position') ? 'is-invalid' : ''}}" id="position" name="position" placeholder="Masukkan posisi" value="{{$organizationalRecord->position}}" required>
                                @error('organizationalRecord')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="category">Kategori</label>
                                <select name="category" id="category" class="form-control {{$errors->has('category') ? 'is-invalid' : ''}}" required>
                                    <option value="">== Pilih Kategori ==</option>
                                        <option value="PMK ITS" <?php if($organizationalRecord->category=="PMK ITS") echo 'selected="selected"'; ?>>PMK ITS</option>
                                        <option value="TPKK ITS" <?php if($organizationalRecord->category=="TPKK ITS") echo 'selected="selected"'; ?>>TPKK ITS</option>
                                </select>
                                @error('category')
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
                                    <input name="year_start" id="year_start" type="text" class="datemask form-control {{$errors->has('year_start') ? 'is-invalid' : ''}}" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask value="{{$organizationalRecord->year_start}}" >
                                    @error('year_start')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>
                        <div class="col-md-6">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label for="year_end">Tahun Selesai</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input name="year_end" id="year_end" type="text" class="datemask form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask value="{{$organizationalRecord->year_end}}">

                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
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