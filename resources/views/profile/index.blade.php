@extends('adminlte.template')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Mahasiswa</h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Mahasiswa</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-md-3">

        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{$url}}" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{$user->name}}</h3>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>

    <div class="col-md-9">

        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active fas fa-user-cog" href="{{ route('users.edit',$user->id) }}"></a>
                    </li>
                </ul>


            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">

                    <div class="active tab-pane" id="data-diri">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Pkk</td>
                                    <td>{{ $user->pkk }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat asal</td>
                                    <td>{{ $user->address_origin }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat saat ini</td>
                                    <td>{{ $user->address }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon Orang Tua / Wali</td>
                                    <td>{{ $user->parent_phone }}</td>
                                </tr>
                                <tr>
                                    <td>Line</td>
                                    <td>{{ $user->line }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal lahir</td>
                                    <td>{{ $user->birthdate }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>{{ $user->gender }}</td>
                                </tr>
                                <tr>
                                    <td>History Organisasi</td>
                                    <td></td>
                                    @foreach($organizations as $organization)
                                    <tr>
                                        <td></td>
                                        <td>{{$organization->position}} {{$organization->category}}</td>
                                    </tr>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.tab-pane -->


                </div>
                <!-- /.tab-content -->

                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>


        @foreach ($user->profiles as $profile)
        @if($profile->model_type == "App\Models\Student")
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active fas fa-user-cog" href="{{ route('profiles.editStudent',$profile->model->id) }}"></a>
                    </li>
                </ul>


            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">

                    <div class="active tab-pane" id="data-diri">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <h2>Mahasiswa</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Department</td>
                                    <td>{{ $profile->model->department }}</td>
                                </tr>
                                <tr>
                                    <td>NRP</td>
                                    <td>{{ $profile->model->nrp }}</td>
                                </tr>

                                <tr>
                                    <td>Tahun masuk</td>
                                    <td>{{ $profile->model->year_entry }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun lulus</td>
                                    <td>{{ $profile->model->year_end }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.tab-pane -->


                </div>
                <!-- /.tab-content -->

                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>

        @elseif($profile->model_type == "App\Models\Alumni")
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active fas fa-user-cog" href="{{ route('profiles.editAlumni',$profile->model->id) }}"></a>
                    </li>
                </ul>


            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">

                    <div class="active tab-pane" id="data-diri">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <h2>Alumni</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Department</td>
                                    <td>{{ $profile->model->department }}</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>{{ $profile->model->job }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.tab-pane -->


                </div>
                <!-- /.tab-content -->

                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>

        @elseif($profile->model_type == "App\Models\Lecturer")
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active fas fa-user-cog" href="{{ route('profiles.editLecturer',$profile->model->id) }}"></a>
                    </li>
                </ul>


            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">

                    <div class="active tab-pane" id="data-diri">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <h2>Dosen</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Department</td>
                                    <td>{{ $profile->model->department }}</td>
                                </tr>
                                <tr>
                                    <td>NID</td>
                                    <td>{{ $profile->model->nidn }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.tab-pane -->


                </div>
                <!-- /.tab-content -->

                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        @endif
        @endforeach
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->

</div>
@endsection