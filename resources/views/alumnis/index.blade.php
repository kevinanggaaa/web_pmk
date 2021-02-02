@extends('adminlte.template')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Alumni PMK ITS</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Alumni</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="card">
    <div class="card-header">

        {{-- notifikasi form validasi --}}
        @if ($errors->has('file'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('file') }}</strong>
        </span>
        @endif

        {{-- notifikasi sukses --}}
        @if ($sukses = Session::get('sukses'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $sukses }}</strong>
        </div>
        @endif



       
        

        
        
        <div class="card-tools">
           
            <div class="">
                <a class="btn btn-success" href="{{ route('alumnis.create') }}"> Tambah data alumni</a>
            </div>
          
        </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body p-3">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Department</th>
                    <th>Pekerjaan</th>
                    
                        <th style="width: 280px">Action</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnis as $alumni)
                <tr>
                    <td>{{ $alumni->name }}</td>
                    <td>{{ $alumni->department }}</td>
                    <td>{{ $alumni->job }}</td>
                    
                    <td>
                        <div style="display: flex">
                            <div style="margin-right: 5px;">
                                
                                <a class="btn btn-info" href="{{ route('alumnis.show',$alumni->id) }}"><i class="fa fa-eye"></i></a>
                               
                            </div>
                            <div style="margin-right: 5px;">
                                
                                <a class="btn btn-primary" href="{{ route('alumnis.edit',$alumni->id) }}"><i class="fa fa-edit"></i></a>
                              
                            </div>
                            <div style="margin-right: 5px;">
                              
                                <form action="{{ route('alumnis.destroy', $alumni->id) }}" method="POST" class="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger deleteData"><i class="fa fa-trash"></i></button>
                                </form>
                                
                            </div>
                        </div>
                    </td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('scripts')
    <!-- Datatables -->
    <script src="{{ asset('/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
      });
    </script>
@endpush
