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
                <h1>Roles Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Role</li>
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

        @can('add role'))
        <div class="card-tools">
                <div class="">
                    <a class="btn btn-success" href="{{ route('roles.create') }}">Tambah Role Baru</a>
                </div>
        </div>
        @endcan
    </div>

    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th style="">Role</th>

                @if(auth()->user()->hasAnyPermission(['view detail role', 'edit role', 'delete role']))
                <th style="">Action</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>

                    @if(auth()->user()->hasAnyPermission(['view detail role', 'edit role', 'delete role']))
                    <td>
                        <div style="display: flex">
                            @can('view detail role'))
                                <div style="margin-right: 5px;">
                                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye"></i></a>
                                </div>
                            @endcan

                            @can('edit role'))
                                <div style="margin-right: 5px;">
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-edit"></i></a>
                                </div>
                            @endcan

                            @can('delete role'))
                            <div style="margin-right: 5px;">
                                @can('delete role')
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                @endcan
                            </div>
                            @endcan
                        </div>
                    </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$roles->links("pagination::bootstrap-4")}}
    </div>
</div>

@endsection