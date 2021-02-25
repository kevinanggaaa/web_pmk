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
                <h1>Tambah organisasi baru</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Organisasi</li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <form role="form" method="POST" action="{{ route('organizational-records.store')  }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="position">Posisi</label>
                                <input type="text" class="form-control {{$errors->has('position') ? 'is-invalid' : ''}}" id="position" name="position" placeholder="Masukkan posisi" value="{{old('position')}}" required>
                                @error('position')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="category">Kategori</label>
                                <input type="text" class="form-control {{$errors->has('category') ? 'is-invalid' : ''}}" id="category" name="category" placeholder="Masukkan kategori organisasi" value="{{old('category')}}" required>
                                @error('category')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label for="year_start">Tahun Masuk</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input name="year_start" id="year_start" type="text" class="datemask form-control {{$errors->has('year_start') ? 'is-invalid' : ''}}" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask value="{{old('year_start')}}">
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
                                    <input name="year_end" id="year_end" type="text" class="datemask form-control {{$errors->has('year_exit') ? 'is-invalid' : ''}}" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask value="{{old('year_end')}}">
                                    @error('year_end')
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