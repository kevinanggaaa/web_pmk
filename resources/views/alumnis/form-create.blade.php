<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form ALumni PMk</title>
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
                <form role="form" method="POST" action="{{ route('alumnis.store')  }}">
                    @csrf
                    <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" placeholder="Masukkan email" value="{{old('email')}}" required>
                                @error('email')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}" id="address" name="address" placeholder="Masukkan alamat" value="{{old('address')}}" >
                                @error('address')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="address_origin">Alamat Asal</label>
                                <input type="text" class="form-control {{$errors->has('address_origin') ? 'is-invalid' : ''}}" id="address_origin" name="address_origin" placeholder="Masukkan alamat asal" value="{{old('address_origin')}}" >
                                @error('address_origin')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="phone">No telp</label>
                                <input type="text" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" id="phone" name="phone" placeholder="Masukkan no telp" value="{{old('phone')}}" >
                                @error('phone')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="parent_phone">No telp ortu</label>
                                <input type="text" class="form-control {{$errors->has('parent_phone') ? 'is-invalid' : ''}}" id="parent_phone" name="parent_phone" placeholder="Masukkan no telp orang tua" value="{{old('parent_phone')}}" >
                                @error('parent_phone')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="line">Id line</label>
                                <input type="text" class="form-control {{$errors->has('line') ? 'is-invalid' : ''}}" id="line" name="line" placeholder="Masukkan id line" value="{{old('line')}}" >
                                @error('line')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
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
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" name="avatar" id="avatar" class="form-control " value="{{old('avatar')}}">
                                @error('avatar')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="pkk">PKK</label>
                                <input type="text" class="form-control {{$errors->has('pkk') ? 'is-invalid' : ''}}" id="pkk" name="pkk" placeholder="Masukkan PKK" value="{{old('pkk')}}" >
                                @error('pkk')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="date_death">Tanggal meninggal</label>
                                <input type="date" class="form-control {{$errors->has('date_death') ? 'is-invalid' : ''}}" id="date_death" name="date_death" placeholder="Masukkan tanggal meninggal" value="{{old('date_death')}}" >
                                @error('date_death')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Nama Alumni</label>
                                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" placeholder="Masukkan Nama Alumni" value="{{old('name')}}" required>
                                @error('name')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="department">Department</label>
                                <input type="text" name="department" id="department" class="form-control {{$errors->has('department') ? 'is-invalid' : ''}}" placeholder="Masukkan Nama Department" value="{{old('department')}}" >
                                @error('department')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="job">Pekerjaan</label>
                                <input type="text" name="job" id="job" class="form-control {{$errors->has('job') ? 'is-invalid' : ''}}" placeholder="Masukkan Nama Pekerjaan" value="{{old('job')}}">
                                @error('job')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="angkatan">Angkatan</label>
                                <input type="text" name="angkatan" id="angkatan" class="form-control {{$errors->has('angkatan') ? 'is-invalid' : ''}}" placeholder="Masukkan angkatan" value="{{old('angkatan')}}">
                                @error('angkatan')
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