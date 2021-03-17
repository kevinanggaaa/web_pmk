@extends('adminlte.template')

@section('content')
    <div class="row">


        <div class="col-sm-12">

            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link @if ($pageNumber == 0) active @endif" href="#informasi" data-toggle="tab">Informasi</a>
                        </li>
                        <li class="nav-item"><a class="nav-link @if ($pageNumber != 0) active @endif" href="#peserta" data-toggle="tab">Peserta</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="@if ($pageNumber == 0) active @endif tab-pane" id="informasi">
                            <table class="table">
                                @foreach ($permissions as $permission)
                                <tbody>
                                    <td>{{$permission->name}}</td> 
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="@if ($pageNumber != 0) active @endif tab-pane" id="peserta">
                            <table class="table">
                            @foreach ($users as $user)
                                <tbody>
                                        <td>{{$user->email}}</td> 
                                </tbody>
                            @endforeach
                            </table>
                            <div class="card-footer">
                                {{$users->links("pagination::bootstrap-4")}}
                            </div>
                        </div>
                        
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->

                    <!-- /.tab-content -->
                </div><!-- /.card-body -->

                
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    
    </div>
@endsection