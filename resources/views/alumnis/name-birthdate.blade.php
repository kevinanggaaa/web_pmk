<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form ALumni PMK</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style type="text/css">
        body{
		background-color: #25274d;
        }
        .contact{
            padding: 4%;
            height: 400px;
        }
        .col-md-3{
            background: #ff9b00;
            padding: 4%;
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }
        .contact-info{
            margin-top:10%;
        }
        .contact-info img{
            margin-bottom: 15%;
        }
        .contact-info h2{
            margin-bottom: 10%;
        }
        .col-md-9{
            background: #fff;
            padding: 3%;
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }
        .contact-form label{
            font-weight:600;
        }
        .contact-form button{
            background: #25274d;
            color: #fff;
            font-weight: 600;
            width: 25%;
        }
        .contact-form button:focus{
            box-shadow:none;
        }
    </style>

</head>

<body >
    
@if ($sukses = Session::get('fail'))
<div class="card bg-warning">
    <div class="card-header">
        {{-- notifikasi gagal --}}
        
        <div class="alert alert-danger">
            <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
            <strong>{{ $sukses }}</strong>
        </div>
    </div>
</div>
@endif

@if ($sukses = Session::get('success'))
<div class="card bg-warning">
    <div class="card-header">
        {{-- notifikasi sukses --}}
        
        <div class="alert alert-success">
            <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
            <strong>{{ $sukses }}</strong>
            <a class="btn btn-info ml-2" href="{{ route('home') }}">Kunjungi Website</a>
        </div>
    </div>
</div>
@endif

    <nav class="navbar navbar-light bg-warning justify-content-between">
        <a class="navbar-brand"></a>
        <form class="form-inline">
            <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
            <a class="btn btn-outline-dark bg-dark my-2 my-sm-0" href="{{ route('alumnis.new') }}"><span style="color:white;">Register</span></a>
        </form>
    </nav>

<div class="container contact">
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
				<h2>ALumni</h2>
				<h4>PMK ITS</h4>
			</div>
		</div>
		
        <div class="col-md-9">
            <div class="contact-form">
                <form role="form" method="get" action="{{ route('alumnis.checkBirthdate')  }}">
                    @csrf
                    <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name" class="control-label">Name</label>
                                <div class="input-group">
                                    <!-- <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-select2-open="name">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span> -->
                                    <select id="name" name="name" class="form-control select2-single" required>
                                        <option></option>
                                        @foreach ($alumnis as $alumni)
                                            <option value= {{ $alumni->id }} >{{$alumni->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="birthdate">Tanggal lahir</label>
                                <input type="date" class="form-control {{$errors->has('birthdate') ? 'is-invalid' : ''}}" id="birthdate" name="birthdate" placeholder="Masukkan tanggal lahir" value="{{old('birthdate')}}" required>
                                @error('birthdate')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                </div>

            </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class=" fa fa-paper-plane"></i>Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>
</body>

</html>