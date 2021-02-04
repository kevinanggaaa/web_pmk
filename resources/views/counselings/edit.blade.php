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


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Counseling: {{$counseling->counselee_name}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Counseling</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card ">
            <form role="form" method="POST" action="{{ route('counselings.update',$counseling->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="topic">Topik</label>
                                <input type="text" name="topic" id="topic" class="form-control" placeholder="Masukkan Contact" value="{{ $counseling->topic }}" required>
                                @error('topic')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="counselor_id">Counselor</label>
                            <select id="counselor_id" name="counselor_id" class="form-control select2" style="width: 100%;">
                                @foreach ($counselors as $counselor)
                                @if ($counselor->id == $counseling->counselor_id)
                                <option value="{{$counselor->id}}" selected>{{$counselor->name}}</option>
                                @else
                                <option value="{{$counselor->id}}">{{$counselor->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="date_time">Tanggal</label>
                                {{-- <input type="datetime-local" class="form-control {{$errors->has('date_time') ? 'is-invalid' : ''}}" id="date_time" name="date_time"
                                placeholder="Masukkan tanggal" value="{{old('date_time')}}"> --}}
                                <div class="input-group">
                                    <input type="datetime-local" class="form-control {{$errors->has('date_time') ? 'is-invalid' : ''}}" id="verified_date" name="date_time" placeholder="Masukkan tanggal" value="{{old('date_time')}}" required>
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
<script src="{{asset('/adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('/adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>

<script>
    $('.datemask').inputmask('yyyy', {
        'placeholder': 'yyyy'
    })
</script>
@endpush
