@extends('frontend.layout')

@section('front_section')

@php
use App\Helpers\CustomBackEnd;
use App\Helpers\regularModules;
@endphp








<div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('front/images/bg_1.jpg') }}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <span class="subheading">Welcome to StudyLab</span>
                <h1 class="mb-4">We Are Online Platform For Make Learn</h1>
                <p class="caps">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia
                </p>
                <p class="mb-0"><a href="#" class="btn btn-primary">Our Course</a> <a href="#"
                        class="btn btn-white">Learn More</a></p>
            </div>
        </div>
    </div>
</div>

@if(!Auth::user())

<section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-7"></div>
            <div class="col-md-5 order-md-last">

                <div class="login-wrap p-4 p-md-5">
                    <h3 class="mb-4">Register Now</h3>
                    <form action="#" class="signup-form" id="user_regireter_form">
                        @csrf
                        <div class="form-group">
                            <label class="label" for="name">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="John Doe">
                            <span class="text-danger" id="name_err"></span>
                        </div>



                        <div class="form-group">
                            <label class="label" for="name">Mobile Number</label>
                            <input type="text" name="mobile_number" class="form-control"
                                placeholder="Enter 10 digit mobile number">
                            <span class="text-danger" id="mobile_number_err"></span>

                        </div>


                        <div class="form-group">
                            <label class="label" for="email">Email Address</label>
                            <input type="text" name="email" class="form-control" placeholder="johndoe@gmail.com">
                            <span class="text-danger" id="email_err"></span>

                        </div>
                        <div class="form-group">
                            <label class="label" for="password">Password</label>
                            <input id="password-field"  type="password"  name="password" class="form-control"
                                placeholder="Password">
                            <span class="text-danger" id="password_err"></span>

                        </div>
                        <div class="form-group">
                            <label class="label" for="password">Confirm Password</label>
                            <input id="password-field" type="password" name="confirm_password" class="form-control"
                                placeholder="Confirm Password">
                            <span class="text-danger" id="confirm_password_err"></span>

                        </div>

                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" name="terms" type="checkbox" id="customCheckbox2">
                            <label for="customCheckbox2" class="custom-control-label">I agree to the <a href="">terms of
                                    service</a></label>
                            <span class="text-danger" id="terms_err"></span>

                        </div>


                        <div class="form-group d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary submit" id="user_regirester_btn"><span
                                    class="fa fa-paper-plane"></span></button>
                        </div>



                        <input type="hidden" name="user_id_created_by" value="self">
                        <input type="hidden" name="user_type" value="user">

                    </form>
                    <p class="text-center">Already have an account? <a href="{{ url('/login') }}">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif






@if(Auth()->user())

@if(empty($plan_subscription[0]) && !empty($plans[0]))

 <!-- Modal -->
<div class="modal fade" id="offersmodelbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">

            @foreach ($plans as  $plans_data)

            @if($plans_data->is_pop_up==1)

            <div class="col-md-4 ftco-animate">
                <div class="project-wrap">
                    <a href="{{ url('package-info') }}" class="img" style="background-image: url('{{ url("storage/media/".$plans_data->image) }}');">
                        <span class="price text-capitalize">{{ $plans_data->categories }}</span>
                    </a>
                    <div class="text p-4">
                        <h3><a href="#">{!! $plans_data->name  !!}</a></h3>

                        @php

                            $url =  regularModules::convertSlugIntoUrl($plans_data->slug );
                        @endphp

                        <ul class="d-flex justify-content-between">
                             <li><a href="{{ url('/buy-plan/'.$url) }}">Buy</a></li>
                            <li class="price">{{ $plans_data->currency  }} {{ $plans_data->price  }}</li>
                        </ul>

                    </div>

                </div>
            </div>
            @endif


            @endforeach



          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endif




<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Start Learning Today</span>
                <h2 class="mb-4">Browse Online Course Category</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3 col-lg-2">
                <a href="#" class="course-category img d-flex align-items-center justify-content-center"
                    style="background-image: url(images/work-1.jpg);">
                    <div class="text w-100 text-center">
                        <h3>IT &amp; Software</h3>
                        <span>100 course</span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-lg-2">
                <a href="#" class="course-category img d-flex align-items-center justify-content-center"
                    style="background-image: url(images/work-9.jpg);">
                    <div class="text w-100 text-center">
                        <h3>Music</h3>
                        <span>100 course</span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-lg-2">
                <a href="#" class="course-category img d-flex align-items-center justify-content-center"
                    style="background-image: url(images/work-3.jpg);">
                    <div class="text w-100 text-center">
                        <h3>Photography</h3>
                        <span>100 course</span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-lg-2">
                <a href="#" class="course-category img d-flex align-items-center justify-content-center"
                    style="background-image: url(images/work-5.jpg);">
                    <div class="text w-100 text-center">
                        <h3>Marketing</h3>
                        <span>100 course</span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-lg-2">
                <a href="#" class="course-category img d-flex align-items-center justify-content-center"
                    style="background-image: url(images/work-8.jpg);">
                    <div class="text w-100 text-center">
                        <h3>Health</h3>
                        <span>100 course</span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-lg-2">
                <a href="#" class="course-category img d-flex align-items-center justify-content-center"
                    style="background-image: url(images/work-6.jpg);">
                    <span class="text w-100 text-center">
                        <h3>Audio Video</h3>
                        <span>100 course</span>
                    </span>
                </a>
            </div>
            <div class="col-md-12 text-center mt-5">
                <a href="{{ url('all-course-category') }}" class="btn btn-secondary">See All Courses</a>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Start Learning Today</span>
                <h2 class="mb-4">Pick Your Course</h2>
            </div>
        </div>
        <div class="row">


            @foreach ($plans as  $plans_data)
            <div class="col-md-4 ftco-animate">
                <div class="project-wrap">
                    <a href="{{ url('package-info') }}" class="img" style="background-image: url('{{ url("storage/media/".$plans_data->image) }}');">
                        <span class="price text-capitalize">{{ $plans_data->categories }}</span>
                    </a>
                    <div class="text p-4">
                        <h3><a href="#">{!! $plans_data->name  !!}</a></h3>

                        @php

                            $url =  regularModules::convertSlugIntoUrl($plans_data->slug );
                        @endphp

                        <ul class="d-flex justify-content-between">
                             <li><a href="{{ url('/buy-plan/'.$url) }}">Buy</a></li>
                            <li class="price">{{ $plans_data->currency  }} {{ $plans_data->price  }}</li>
                        </ul>

                    </div>

                </div>
            </div>

            @endforeach











        </div>
    </div>
</section>

<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 d-flex align-items-center">
                    <div class="icon"><span class="flaticon-online"></span></div>
                    <div class="text">
                        <strong class="number" data-number="400">0</strong>
                        <span>Online Courses</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 d-flex align-items-center">
                    <div class="icon"><span class="flaticon-graduated"></span></div>
                    <div class="text">
                        <strong class="number" data-number="4500">0</strong>
                        <span>Students Enrolled</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 d-flex align-items-center">
                    <div class="icon"><span class="flaticon-instructor"></span></div>
                    <div class="text">
                        <strong class="number" data-number="1200">0</strong>
                        <span>Experts Instructors</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 d-flex align-items-center">
                    <div class="icon"><span class="flaticon-tools"></span></div>
                    <div class="text">
                        <strong class="number" data-number="300">0</strong>
                        <span>Hours Content</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-about img">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-12 about-intro">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="d-flex about-wrap">
                            <div class="img d-flex align-items-center justify-content-center"
                                style="background-image:url(images/about-1.jpg);">
                            </div>
                            <div class="img-2 d-flex align-items-center justify-content-center"
                                style="background-image:url(images/about.jpg);">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pl-md-5 py-5">
                        <div class="row justify-content-start pb-3">
                            <div class="col-md-12 heading-section ftco-animate">
                                <span class="subheading">Enhanced Your Skills</span>
                                <h2 class="mb-4">Learn Anything You Want Today</h2>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right
                                    at the coast of the Semantics, a large language ocean. A small river named Duden
                                    flows by their place and supplies it with the necessary regelialia.</p>
                                <p><a href="#" class="btn btn-primary">Get in touch with us</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section testimony-section bg-light">
    <div class="overlay" style="background-image: url(images/bg_2.jpg);"></div>
    <div class="container">
        <div class="row pb-4">
            <div class="col-md-7 heading-section ftco-animate">
                <span class="subheading">Testimonial</span>
                <h2 class="mb-4">What Are Students Says</h2>
            </div>
        </div>
    </div>
    <div class="container container-2">
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="star">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p>
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="star">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p>
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="star">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p>
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="star">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p>
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="star">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p>
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-intro ftco-section ftco-no-pb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <div class="img" style="background-image: url(images/bg_4.jpg);">
                    <div class="overlay"></div>
                    <h2>We Are StudyLab An Online Learning Center</h2>
                    <p>We can manage your dream building A small river named Duden flows by their place</p>
                    <p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Enroll Now</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section services-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 heading-section pr-md-5 ftco-animate d-flex align-items-center">
                <div class="w-100 mb-4 mb-md-0">
                    <span class="subheading">Welcome to StudyLab</span>
                    <h2 class="mb-4">We Are StudyLab An Online Learning Center</h2>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It
                        is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,
                        a large language ocean.</p>
                    <div class="d-flex video-image align-items-center mt-md-4">
                        <a href="#" class="video img d-flex align-items-center justify-content-center"
                            style="background-image: url(images/about.jpg);">
                            <span class="fa fa-play-circle"></span>
                        </a>
                        <h4 class="ml-4">Learn anything from StudyLab, Watch video</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="services">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-tools"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Top Quality Content</h3>
                                <p>A small river named Duden flows by their place and supplies</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="services">
                            <div class="icon icon-2 d-flex align-items-center justify-content-center"><span
                                    class="flaticon-instructor"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Highly Skilled Instructor</h3>
                                <p>A small river named Duden flows by their place and supplies</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="services">
                            <div class="icon icon-3 d-flex align-items-center justify-content-center"><span
                                    class="flaticon-quiz"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">World Class &amp; Quiz</h3>
                                <p>A small river named Duden flows by their place and supplies</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="services">
                            <div class="icon icon-4 d-flex align-items-center justify-content-center"><span
                                    class="flaticon-browser"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Get Certified</h3>
                                <p>A small river named Duden flows by their place and supplies</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Our Blog</span>
                <h2 class="mb-4">Recent Post</h2>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-lg-4 ftco-animate">
                <div class="blog-entry">
                    <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
                    </a>
                    <div class="text d-block">
                        <div class="meta">
                            <p>
                                <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 17, 2020</a>
                                <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                                <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                            </p>
                        </div>
                        <h3 class="heading"><a href="#">I'm not creative, Should I take this course?</a></h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia...
                        </p>
                        <p><a href="blog.html" class="btn btn-secondary py-2 px-3">Read more</a></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 ftco-animate">
                <div class="blog-entry">
                    <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
                    </a>
                    <div class="text d-block">
                        <div class="meta">
                            <p>
                                <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 17, 2020</a>
                                <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                                <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                            </p>
                        </div>
                        <h3 class="heading"><a href="#">I'm not creative, Should I take this course?</a></h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia...
                        </p>
                        <p><a href="blog.html" class="btn btn-secondary py-2 px-3">Read more</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ftco-animate">
                <div class="blog-entry">
                    <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
                    </a>
                    <div class="text d-block">
                        <div class="meta">
                            <p>
                                <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 17, 2020</a>
                                <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                                <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                            </p>
                        </div>
                        <h3 class="heading"><a href="#">I'm not creative, Should I take this course?</a></h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia...
                        </p>
                        <p><a href="blog.html" class="btn btn-secondary py-2 px-3">Read more</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection

@push('front_scripts')


<script>
    $("#user_regireter_form").submit(function(e) {
        e.preventDefault();

        var btn_html =`<span class="fa fa-paper-plane"></span>`

        $('#user_regirester_btn').prop('disabled', true);

          $("#user_regirester_btn").html('please wait..')

        var user_regireter_form = new FormData($(this)[0])
        $("#name_err").html(' ')
        $("#mobile_number_err").html(' ')
        $("#email_err").html(' ')
        $("#password").html(' ')
        $("#confirm_password_err").html(' ')
        $("#terms_err").html(' ')

        $.ajax({
            type: "post",
            Headers: {
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            },
            url: '/register',
            data: user_regireter_form,
            success: function(data) {


                if (data.success){
                    $("#user_regirester_btn").html(btn_html)
                    $("#name_err").html(' ')
                    $("#mobile_number_err").html(' ')
                    $("#email_err").html(' ')
                    $("#password_err").html(' ')
                    $("#confirm_password_err").html(' ')
                    $("#terms_err").html(' ')

                Swal.fire(
                'Account registration successful !',
                'For Activation You Will Recive An Email',
                'success'
                )


                    $("#user_regireter_form")[0].reset()
                    toastr.success(data.success)
                   setTimeout(function(){
                    window.location.href = '/login'
                   }, 8000);


                }else{

                    $('#user_regirester_btn').prop('disabled', false);
                    $("#user_regirester_btn").html(btn_html)

                      $("#name_err").html(data.errors.name)
                        $("#mobile_number_err").html(data.errors.mobile_number)
                        $("#email_err").html(data.errors.email)
                        $("#password_err").html(data.errors.password)
                        $("#confirm_password_err").html(data.errors.confirm_password)
                        $("#terms_err").html(data.errors.terms)

                }

            },

            contentType: false,
            processData: false,
            cache: false,

        });
    })




    $('#offersmodelbox').modal('show')


</script>
@endpush
