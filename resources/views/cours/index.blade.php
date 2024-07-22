@extends('main.index')

@section('content')
 
<section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
    <div class="container">
    <div class="row">
        <div class="col-md-7">
        <h1 class="text-white font-weight-bold">Cours</h1>
        <div class="custom-breadcrumbs">
            <a href="{{route('offres.jobsRecents')}}">Home</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Cours</strong></span>
        </div>
        </div>
    </div>
    </div>
</section>

<section style="margin-top: 5%; margin-bottom: 5%;">
    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <button class="btn btn-primary"><a href="{{route('cours.create')}}" style="text-decoration: none; color: white;">Ajouter un cours</a></button>
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Cours</h6>
                <h1 class="mb-5">Cours Disponible</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <a href="">
                                <img class="img-fluid" src="{{asset('IT/images/course-1.jpg')}}" alt="">
                                <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                    <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                    <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">Design Web Pour les Debutants</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <a href="">
                                <img class="img-fluid" src="{{asset('IT/images/course-2.jpg')}}" alt="">
                                <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                    <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                    <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">Initiation à l'Ethical Hacking</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <a href="">
                                <img class="img-fluid" src="{{asset('IT/images/course-3.jpg')}}" alt="">
                                <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                    <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                    <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">Introduction à Laravel</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->
</section>

@endsection