@extends('adminlte.template')

@section('content')
    <div class="row">


        <div class="col-sm-12">

            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#informasi" data-toggle="tab">Informasi</a>
                        </li>
                        <li class="nav-item" ><a class="nav-link" @if (Request::query('page') === null || Request::query('page') == 'home') class="active" @endif href="#peserta" data-toggle="tab">User</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="informasi">
                            <table class="table">
                                @foreach ($permissions as $permission)
                                <tbody>
                                    <td>{{$permission->name}}</td> 
                                </tbody>
                                @endforeach
                            </table>
                        </div>

                        <!-- /.tab-pane --> 
                        <div class="tab-pane @if (Request::query('page') === null || Request::query('page') == 'home') active @endif" id="peserta">
                        <table class="table">
                            @foreach ($users as $user)
                                <tbody>
                                        <td>{{$user->email}}</td> 
                                </tbody>
                            @endforeach
                        </table>
                        <div class="card-footer">
                            {{$users->appends(['page' => 'home'])->links("pagination::bootstrap-4")}}
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

@push('scripts')
<script>
$(document).ready(function(){

var url = document.location.toString();
 if (url.match('#')) {
     $('.nav-item a[href="#' + url.split('#')[1] + '"]')[0].click();
 } 

 //To make sure that the page always goes to the top
 setTimeout(function () {
     window.scrollTo(0, 0);
 },200);

});
</script>
@endpush