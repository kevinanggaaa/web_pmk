<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Absen Event PMK</title>
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
@if ($message = Session::get('fail'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif

<div class="container contact">
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<h2>Absen</h2>
				<h4>PMK ITS</h4>
			</div>
		</div>
		
        <div class="col-md-9">
            <div class="contact-form">
                <form role="form" method="POST" action="{{ route('events.attend', $event->id)  }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nrp">NRP / NID / Email</label>
                                    <input type="text" class="form-control {{$errors->has('nrp') ? 'is-invalid' : ''}}" id="nrp" name="nrp" placeholder="Masukkan NRP / NID / Email" value="{{old('nrp')}}">
                                    @error('nrp')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class=" fa fa-paper-plane"></i>Absen</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>
</body>

</html>