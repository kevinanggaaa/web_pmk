<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Renungan Harian PMK ITS</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style type="text/css">
        /* Layout */

        html, body {
            background: #eee3c8;
            margin: 0;
            padding: 0 0 15px;
        }

        article {
            margin: auto;
            max-width: 1000px;
            display: grid;
            grid-template-columns: auto 1fr auto;
            grid-gap: .5em;
        }
        h1, cite, img, aside, main {
            grid-column: 2;
        }
        main {
            max-width: 650px;
            margin: auto;
            text-align: justify;
        }
        img {
            width: 100%;
        }
        p:first-child {
            margin-top: 0;
        }
        p:last-child::after {
            content: ' ■';
            opacity: 0.2;
        }
        /* Title Layout */
        h1 span {
            display: block;
        }
        .focusing {
            margin-bottom: -10px;
        }
        .the {
            transform: translateY(50%);
            background: #eee3c8;
            width: 50px;
            margin: auto;
        }
        .heart {
            border: thin solid black;
            border-width: thin 0;
            padding: 10px 0 0;
        }
        /* Typography */
        h1 {
            text-align: center;
        }
        .focusing {
            font-family: 'questa-grande';
            text-transform: uppercase;
            font-size: 0.5em;
        }
        .the {
            font-family: 'brandon-grotesque';
            text-transform: uppercase;
            font-size: 0.5em;
        }
        .heart {
            font-family: 'ltc-bodoni-175';
            text-transform: uppercase;
            font-size: 2em;
        }
        cite {
            font-family: 'brandon-grotesque';
            font-style: normal;
            text-transform: uppercase;
            text-align: center;
        }
        .name {
            font-weight: 900;
        }
        main {
            font-family: 'abril-text';
        }
        .dropcap {
            font-family: 'brandon-grotesque';
            text-transform: uppercase;
            font-size: 0.9em;
            letter-spacing: 0.1em;
        }
        aside {
            font-family: 'brandon-grotesque';
            font-style: italic;
            text-align: right;
        }


        @media only screen and (min-width:750px) {
            /* Layout */
            html, body { padding: 10px 0; }

            article {
                grid-template-columns: 1fr 3fr 1fr;
                grid-gap: 1.5em;
            }
            main {
                margin: 0;
            }
            aside {
                grid-column: 1;
                grid-row: 4;
                margin-top: -10em;
            }
            /* Title */
            .focusing {
                padding-top : 10px;
                font-size: 1em;
                margin-bottom: -15px;
            }
            .the {
                font-size: 0.75em;
            }
            .heart {
                font-size: 4em;
            }
        }
    </style>

</head>

<body >
<article>
	<h1>
		<span class="focusing">{{$renungan->title}}</span> 
        <br>
		<!-- <span class="the">The</span> 
		<span class="heart">Heart</span> -->
	</h1>
	<cite>
		Renungan harian <span class="name">PMK ITS</span> | 
		Tanggal <span class="name">{{$renungan->tanggal}}</span>
	</cite>
	<img src="{{url('landingpage/renungan/'.$renungan->image)}}" />
    
	<aside><strong>{{$renungan->isiFirman}}<br><br>{{$renungan->lokasiFirman}}</br></strong></aside>
    <!-- <aside>{{$renungan->lokasiFirman}}</aside> -->
	<main>
        <br></br>
		<p><center>{{$renungan->bacaan}}</center></p>
	</main>
</article>
</body>

</html>