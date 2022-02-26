@extends('user.video.layout')
@php
use App\Helpers\regularModules;
@endphp
@section('mytube_main_section')
<div class="container-fluid pb-0">
    <div class="top-mobile-search">
        <div class="row">
            <div class="col-md-12">
                <form class="mobile-search">
                    <div class="input-group">
                        <input type="text" placeholder="Search for..." class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="top-category section-padding mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="main-title">

                    <h6> Categories</h6>
                </div>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel owl-carousel-category">


                    @foreach ($categories as $categories_data )
                    @php
                    $url = regularModules::convertSlugIntoUrl($categories_data->vod_category_slug)
                    @endphp

                    <div class="item">
                        <div class="category-item">
                            <a href="{{ url('videos/'.$url) }}">
                                @if(!empty($categories_data->image))
                                <img class="img-fluid" src="{{ url('storage/'.$categories_data->image) }}" alt="">
                                @else
                                <img class="img-fluid" src="{{ asset('dist/img/noimage.png') }}" alt="">

                                @endif

                                <h6>{{ $categories_data->vod_category_name }}</h6>
                                {{-- <p>74,853 views</p> --}}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="video-block section-padding">
        <div class="row">
            <div class="col-md-12">
                <div class="main-title">
                    <div class="btn-group float-right right-action">
                        <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                        </div>
                    </div>
                    <h6>Featured Videos</h6>
                </div>
            </div>

            @foreach ($video_libraries_is_featured as $video_libraries_is_featured_data )

            @php
            $url = regularModules::convertSlugIntoUrl($video_libraries_is_featured_data->vod_category_slug)
            @endphp


            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="video-card">
                    <div class="video-card-image">
                        <a class="play-icon"
                            href="{{ url('videos/'.$url.'/'.$video_libraries_is_featured_data->id) }}"><i
                                class="fas fa-play-circle"></i></a>
                        <a href="{{ url('videos/'.$url.'/'.$video_libraries_is_featured_data->id) }}">
                            @if(!empty($video_libraries_is_featured_data->thumbnail))
                            <img class="img-fluid"
                                src="{{ url('storage/media/'.$video_libraries_is_featured_data->thumbnail) }}" alt=""
                                style="width:360px; height:240px;">
                            @else
                            <img class="img-fluid" src="{{asset('dist/img/noimage.png')}}" alt=""
                                style="width:360px; height:240px;">
                            @endif


                        </a>
                        @php

                        $getID3 = new \getID3;
                        $file = $getID3->analyze( 'storage/media/'.$video_libraries_is_featured_data ->file_name);
                        if(!empty($file['playtime_seconds'])){
                        $duration = gmdate('H:i:s.v', $file['playtime_seconds']);
                        }else{
                        $duration = 0;
                        }
                        @endphp



                        <div class="time">{{ $duration }}</div>
                    </div>
                    <div class="video-card-body">
                        <div class="video-title">
                            <a href="#">{{ substr($video_libraries_is_featured_data->title,0,44) }}</a>
                        </div>
                        <div class="video-page text-success">
                            {{ $video_libraries_is_featured_data->vod_category_name }}
                            <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                data-original-title="Verified">
                                <i class="fas fa-check-circle text-success"></i>
                            </a>
                        </div>
                        <div class="video-view">
                            {{-- 1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago --}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>



    @foreach ($categories_premium as $categories_premium_data )

    <hr>
    <div class="video-block section-padding">
        <div class="row">
            <div class="col-md-12">
                <div class="main-title">
                    <div class="btn-group float-right right-action">
                        <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                        </div>
                    </div>
                    <h6>{{ $categories_premium_data->vod_category_name }} (<b class="text-success">preamium</b>)</h6>
                </div>
            </div>

          @foreach ($video_libraries_is_premium as $video_libraries_is_premium_data )

          @if($video_libraries_is_premium_data->video_category_id==$categories_premium_data->video_cat_id)


            @php
            $url = regularModules::convertSlugIntoUrl($video_libraries_is_premium_data->vod_category_slug)
            @endphp


            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="video-card">
                    <div class="video-card-image">
                        <a class="play-icon"
                            href="{{ url('videos/'.$url.'/'.$video_libraries_is_premium_data->id) }}"><i
                                class="fas fa-play-circle"></i></a>
                        <a href="{{ url('videos/'.$url.'/'.$video_libraries_is_premium_data->id) }}">
                            @if(!empty($video_libraries_is_premium_data->thumbnail))
                            <img class="img-fluid"
                                src="{{ url('storage/media/'.$video_libraries_is_premium_data->thumbnail) }}" alt=""
                                style="width:360px; height:240px;">
                            @else
                            <img class="img-fluid" src="{{asset('dist/img/noimage.png')}}" alt=""
                                style="width:360px; height:240px;">
                            @endif


                        </a>
                        @php

                        $getID3 = new \getID3;
                        $file = $getID3->analyze( 'storage/media/'.$video_libraries_is_premium_data ->file_name);
                        if(!empty($file['playtime_seconds'])){
                        $duration = gmdate('H:i:s.v', $file['playtime_seconds']);
                        }else{
                        $duration = 0;
                        }
                        @endphp



                        <div class="time">{{ $duration }}</div>
                    </div>
                    <div class="video-card-body">
                        <div class="video-title">
                            <a href="#">{{ substr($video_libraries_is_featured_data->title,0,44) }}</a>
                        </div>
                        <div class="video-page text-success">
                            {{ $video_libraries_is_featured_data->vod_category_name }}
                            <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                data-original-title="Verified">
                                <i class="fas fa-check-circle text-success"></i>
                            </a>
                        </div>
                        <div class="video-view">

                        </div>
                    </div>
                </div>
            </div>
            @endif

            @endforeach
        </div>
    </div>

    @endforeach






    <hr>
    <div class="video-block section-padding">
        <div class="row">
            <div class="col-md-12">
                <div class="main-title">
                    <div class="btn-group float-right right-action">
                        <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                        </div>
                    </div>
                    <h6>Online Meeting</h6>
                </div>
            </div>

            @foreach ($Interactive_online_class as $Interactive_online_class_data )

            @php

            $url = regularModules::convertSlugIntoUrl($Interactive_online_class_data->categories_slug);



            @endphp



            <div class="col-xl-3 col-sm-6 mb-3 text-capitalize">
                <div class="video-card">
                    <div class="video-card-image">
                        <a class="play-icon" href="{{ url('https://'.$Interactive_online_class_data->meeting_url) }}"><i
                                class="fas fa-play-circle"></i></a>
                        <a href="{{ url( 'https://'.$Interactive_online_class_data->meeting_url) }}">
                            @if(!empty($Interactive_online_class_data->thumbnail))
                            <img class="img-fluid"
                                src="{{ url('storage/media/'.$Interactive_online_class_data->thumbnail) }}" alt=""
                                style="width:360px; height:240px;">
                            @else
                            <img class="img-fluid" src="{{asset('dist/img/noimage.png')}}" alt=""
                                style="width:360px; height:240px;">

                            @endif


                        </a>

                    </div>
                    <div class="video-card-body">
                        <div class="video-title">
                            <a href="#">{{ substr($Interactive_online_class_data->session_name,0,44) }}</a>
                        </div>
                        <div class="video-page text-success">
                            {{ $Interactive_online_class_data->vod_category_name }}

                            <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="">
                                {{-- <i class="fas fa-check-circle text-success"></i> --}}
                                From: {{ $Interactive_online_class_data->date }},{{ $Interactive_online_class_data->from
                                }},
                                To: {{ $Interactive_online_class_data->date }},{{ $Interactive_online_class_data->to }},

                            </a>
                        </div>
                        <div class="video-view">
                            {{-- 1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago --}}
                        </div>
                    </div>
                </div>
            </div>



            @endforeach
        </div>
    </div>









    <hr class="mt-0">
    <div class="video-block section-padding">
        <div class="row">
            <div class="col-md-12">
                <div class="main-title">
                    <div class="btn-group float-right right-action">
                        <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                        </div>
                    </div>
                    <h6>Popular Channels</h6>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="channels-card">
                    <div class="channels-card-image">
                        <a href="#"><img class="img-fluid" src="img/s1.png" alt=""></a>
                        <div class="channels-card-image-btn"><button type="button"
                                class="btn btn-outline-danger btn-sm">Subscribe <strong>1.4M</strong></button></div>
                    </div>
                    <div class="channels-card-body">
                        <div class="channels-title">
                            <a href="#">Channels Name</a>
                        </div>
                        <div class="channels-view">
                            382,323 subscribers
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="channels-card">
                    <div class="channels-card-image">
                        <a href="#"><img class="img-fluid" src="img/s2.png" alt=""></a>
                        <div class="channels-card-image-btn"><button type="button"
                                class="btn btn-outline-danger btn-sm">Subscribe <strong>1.4M</strong></button></div>
                    </div>
                    <div class="channels-card-body">
                        <div class="channels-title">
                            <a href="#">Channels Name</a>
                        </div>
                        <div class="channels-view">
                            382,323 subscribers
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="channels-card">
                    <div class="channels-card-image">
                        <a href="#"><img class="img-fluid" src="img/s3.png" alt=""></a>
                        <div class="channels-card-image-btn"><button type="button"
                                class="btn btn-outline-secondary btn-sm">Subscribed <strong>1.4M</strong></button></div>
                    </div>
                    <div class="channels-card-body">
                        <div class="channels-title">
                            <a href="#">Channels Name <span title="" data-placement="top" data-toggle="tooltip"
                                    data-original-title="Verified"><i class="fas fa-check-circle"></i></span></a>
                        </div>
                        <div class="channels-view">
                            382,323 subscribers
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="channels-card">
                    <div class="channels-card-image">
                        <a href="#"><img class="img-fluid" src="img/s4.png" alt=""></a>
                        <div class="channels-card-image-btn"><button type="button"
                                class="btn btn-outline-danger btn-sm">Subscribe <strong>1.4M</strong></button></div>
                    </div>
                    <div class="channels-card-body">
                        <div class="channels-title">
                            <a href="#">Channels Name</a>
                        </div>
                        <div class="channels-view">
                            382,323 subscribers
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
