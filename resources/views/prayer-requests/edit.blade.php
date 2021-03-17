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
                <h1>Edit Pray Request: {{$prayerRequest->name}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Pray Request</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card ">
            <form role="form" method="POST" action="{{ route('prayer-requests.update',$prayerRequest->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Nama </label>
                                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" placeholder="Masukkan Nama" value="{{ $prayerRequest->name }}" >
                                @error('name')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="content">Content doa</label>
                                <input type="text" class="form-control {{$errors->has('content') ? 'is-invalid' : ''}}" id="content" name="content" placeholder="Masukkan Content doa" value="{{ $prayerRequest->content }}" required>
                                @error('content')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control {{$errors->has('status') ? 'is-invalid' : ''}}" required>
                                    <option value="">== Pilih Status ==</option>
                                        <option value="requested" <?php if($prayerRequest->status=="requested") echo 'selected="selected"'; ?>>Requested</option>
                                        <option value="rejected" <?php if($prayerRequest->status=="rejected") echo 'selected="selected"'; ?>>Rejected</option>
                                        <option value="finish" <?php if($prayerRequest->status=="finish") echo 'selected="selected"'; ?>>Finish</option>
                                </select>
                                @error('type')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i>Submit</button>
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