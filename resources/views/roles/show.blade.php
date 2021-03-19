@extends('adminlte.template')

@section('content')
    <div class="row">


        <div class="col-sm-12">

            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="active nav-link" href="#informasi" data-toggle="tab">Informasi</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#peserta" data-toggle="tab">Peserta</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="informasi">
                            <table id="example2" class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Permission yang dimiliki</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{$permission->name}}</td> 
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="peserta">
                            <table id="example1" class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->email}}</td> 
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
<!-- Datatables -->
<script src="{{ asset('/AdminLTE-3.0.5/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/AdminLTE-3.0.5/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('/AdminLTE-3.0.5/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('/AdminLTE-3.0.5/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
    $(function() {
        $("#example2").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endpush