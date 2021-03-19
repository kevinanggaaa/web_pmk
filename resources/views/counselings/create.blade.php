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
                <h1>Add New Counseling</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Konseling</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <form role="form" method="POST" action="{{ route('counselings.store')  }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="topic">Topik</label>
                                <input type="text" class="form-control" id="topic" name="topic" placeholder="Masukkan Contact" value="{{old('topic')}}" required>
                                @error('topic')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="counselor_id">Counselor</label>
                            <select id="counselor_id" name="counselor_id" class="form-control select2" style="width: 100%;" required>
                                @foreach ($counselors as $counselor)
                                <option value="{{$counselor->id}}">{{$counselor->name}}</option>
                                @endforeach
                            </select>
                            @error('counselor_id')
                            <span class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="date_time">Tanggal</label>
                                {{-- <input type="datetime-local" class="form-control {{$errors->has('date_time') ? 'is-invalid' : ''}}" id="date_time" name="date_time"
                                placeholder="Masukkan tanggal" value="{{old('date_time')}}"> --}}
                                <div class="input-group">
                                    <input type="datetime-local" class="form-control {{$errors->has('date_time') ? 'is-invalid' : ''}}" id="verified_date" name="date_time" placeholder="Masukkan tanggal" value="{{old('date_time')}}">
                                </div>
                                @error('date_time')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>



                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
@endpush