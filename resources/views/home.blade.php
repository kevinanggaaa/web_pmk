@extends('salvation.master')

@section('content')

<section class="hero-wrap js-fullheight">
    <div class="home-slider js-fullheight owl-carousel">
        @foreach($homes as $home)
        <div class="slider-item js-fullheight" style="background-image:url(landingpage/home/{{$home->image}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-8 ftco-animate">
                        <div class="text mt-md-5 w-100 text-center">
                            <h2>{{$home->subtitle}}</h2>
                            <h1 class="mb-3">{{$home->title}}</h1>
                            <p class="mb-4 pb-3">{{$home->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- <div class="slider-item js-fullheight" style="background-image:url(salvation/images/bg_2.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-8 ftco-animate">
                        <div class="text mt-md-5 w-100 text-center">
                            <h2>Welcome to PMK ITS</h2>
                            <h1 class="mb-3">Perkumpulan Mahasiswa Kristen ITS</h1>
                            <p class="mb-4 pb-3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in.</p>
                            <p class="mb-0"><a href="#" class="btn btn-primary py-3 px-2 px-md-4">Become A Volunteer</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</section>

<section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-8 d-flex">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="services-2">
                            <div class="icon"><span class="flaticon-church"></span></div>
                            <div class="text">
                                <h4>{{$VisiMisi->title1}}</h4>
                                <!-- <span class="subheading">What to expect</span> -->
                                <p>{{$VisiMisi->description1}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="services-2">
                            <div class="icon"><span class="flaticon-pray"></span></div>
                            <div class="text">
                                <h4>{{$VisiMisi->title2}}</h4>
                                <p>{{$VisiMisi->description2}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="services-2">
                            <div class="icon"><span class="flaticon-love"></span></div>
                            <div class="text">
                                <h4>{{$VisiMisi->title3}}</h4>
                                <p>{{$VisiMisi->description3}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="services-2 services-block">
                    <div class="text">
                        <h4>{{$VisiMisi->judul}}</h4>
                        <p>{{$VisiMisi->subjudul}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb bg-light" id='about'>
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 d-flex">
                <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url('landingpage/about/{{$about->image}}');">
                </div>
            </div>
            <div class="col-md-6 pl-md-5 py-md-5">
                <div class="heading-section pt-md-5 mb-4">
                    <span class="subheading">{{$about->subtitle}}</span>
                    <h2 class="mb-5">{{$about->title}}</h2>
                    <p>{{$about->description}}</p>
                    <!-- <p><a href="#" class="btn btn-primary">Learn More</a></p> -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-counter bg-primary" id="section-counter">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-5 mb-md-0 text-center text-md-left">
                <h2 class="font-weight-bold" style="color: #fff; font-size: 22px; text-transform: uppercase;">We're
                    on a mission to help all your problems</h2>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="1005000">0</strong>
                            </div>
                            <div class="text">
                                <span>Members</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="65000">0</strong>
                            </div>
                            <div class="text">
                                <span>Pastors</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="500000">0</strong>
                            </div>
                            <div class="text">
                                <span>Donations</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="50">0</strong>
                            </div>
                            <div class="text">
                                <span>Churches</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section"  id='persekutuan-jumat'>
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Persekutuan Jumat</span>
                <h2>Persekutuan Jumat Terbaru</h2>
            </div>
        </div>
        @foreach($psJumats as $pj)
        <div class="row no-gutters d-flex sermon-wrap ftco-animate bg-light">
            <div class="col-md-6 d-flex align-items-stretch js-fullheight ftco-animate">
                <a href="#" class="img" style="background-image: url(landingpage/event/{{$pj->image}});"></a>
            </div>
            <div class="col-md-6 py-4 py-md-5 ftco-animate d-flex align-items-center">
                <div class="text p-md-5">
                    <h2 class="mb-4"><a href="sermon.html">{{$pj->title}}</a></h2>
                    <div class="meta">
                        <p>
                            @if($pj->speaker)
                            <span>Speaker: <a href="#" class="ptr">{{$pj->speaker}}</a></span>
                            @endif
                            <span><a href="#">{{$pj->start}}@if($pj->end) until {{$pj->end}}@endif</a></span>
                        </p>
                    </div>
                    <p>{{$pj->description}}</p>
                    <p class="mt-4 btn-customize">
                        @if($pj->link)
                        <a href="{{$pj->link}}" target="_blank" class="btn btn-primary px-4 py-3 mr-md-2"><span class="fa fa-play"></span>
                            Watch Sermons</a>
                        @else
                        <p class="text-danger">No Video Available</p>
                        @endif

                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section class="ftco-section testimony-section">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-7 heading-section heading-section-white text-center ftco-animate">
                <span class="subheading">Kesaksian</span>
                <h2>PMK Sharing</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    @foreach($testimonies as $testimony)
                    <div class="item">
                        <div class="testimony-wrap d-md-flex">
                            <div class="user-img" style="background-image: url(landingpage/testimony/{{$testimony->image}})">
                            </div>
                            <div class="text pl-md-4">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="fa fa-quote-left"></i>
                                </span>
                                <p>{{$testimony->quote}}</p>
                                <p class="name">{{$testimony->name}}</p>
                                <p>{{$testimony->position}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section"  id='renungan'>
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Renungan harian</span>
                <h2>Renungan harian terbaru PMK ITS</h2>
            </div>
        </div>

        
        <div class="row d-flex">
            @foreach($renungans as $renungan)
            <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20" style="background-image: url('landingpage/renungan/{{$renungan->image}}');">
                    </a>
                    <div class="text p-4">
                        <div class="meta mb-2">
                            <div><a href="#">{{$renungan->created_at}}</a></div>
                        </div>
                        <h3 class="heading"><a href="#">{{$renungan->lokasiFirman}}</a></h3>
                        <p>{{$renungan->isiFirman}}</p>
                        <p><a href="{{ route('renungan.show',$renungan->id) }}" class="btn btn-primary">Read more</a></p>
                    </div>
                </div>
            </div>  
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt"  id='event'>
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Events</span>
                <h2>Latest Events</h2>
            </div>
        </div>
        <div class="row">
            @foreach($events as $event)
            <div class="col-md-12 event-wrap d-md-flex ftco-animate">
                <div class="img" style="background-image: url(landingpage/event/{{$event->image}});"></div>
                <div class="text p-4 px-md-5 d-flex align-items-center">
                    <div class="desc">
                        <h2 class="mb-4"><a href=#>{{$event->title}}</a></h2>
                        <div class="meta">
                            <p>
                                <span><i class="fa fa-calendar mr-2"></i> {{$event->start}}@if($event->end) until {{$event->end}}@endif</span>
                                <span><i class="fa fa-map-marker mr-2"></i> <a href="#">{{$event->location}}</a></span>
                                <span>{{$event->description}}</span>
                            </p>
                        </div>
                        @if($event->link)
                        <p><a href="{{$event->link}}" target="_blank" class="btn btn-primary">More Details</a></p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection