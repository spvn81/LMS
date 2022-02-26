@extends('user.video.layout')
@php
use App\Helpers\regularModules;
@endphp
@section('mytube_main_section')
    <div class="container-fluid pb-0">
        <div class="video-block section-padding">
            <div class="row">
                <div class="col-md-8">

                    @if(!empty($videos_data[0]))

                    <div class="single-video-left">
                        <div class="single-video">


                            <video id="my-video" class="video-js vjs-theme-city" controls preload="auto" width="640"
                                height="360" poster="{{ url('storage/media/' . $videos_data[0]->thumbnail) }}"
                                data-setup="{}">
                                <source src="{{ url('storage/media/' . $videos_data[0]->file_name) }}" type="video/mp4" />

                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a
                                    web browser that
                                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                        video</a>
                                </p>
                            </video>



                        </div>
                        <div class="single-video-title box mb-3">
                            <h2><a href="#">{{ $videos_data[0]->title }}.</a></h2>
                            <p class="mb-0"><i class="fas fa-eye"></i> views    {{ $views_count }}</p>


                        </div>
                        <div class="single-video-author box mb-3">
                            {{-- <div class="float-right"><button class="btn btn-danger" type="button">Subscribe <strong>1.4M</strong></button> <button class="btn btn btn-outline-danger" type="button"><i class="fas fa-bell"></i></button></div> --}}
                            @if (!empty($videos_data[0]->image))
                                <img class="img-fluid" src="{{ url('storage/' . $videos_data[0]->image) }}" alt="">
                            @else
                                <img class="img-fluid" src="{{ asset('dist/img/noimage.png') }}" alt="">
                            @endif
                            <p><a href="#"><strong>{{ $videos_data[0]->vod_category_name }}</strong></a> <span title=""
                                    data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i
                                        class="fas fa-check-circle text-success"></i></span></p>
                            {{-- <small>Published on Aug 10, 2018</small> --}}
                        </div>
                        <div class="single-video-info-content box mb-3">
                            <h6>Cast:</h6>
                            <p>{{ $videos_data[0]->cast }}</p>
                            <h6>Category :</h6>
                            <p>{{ $videos_data[0]->vod_category_name }}</p>
                            <h6>About :</h6>
                            <p>{{ $videos_data[0]->description }}</p>

                        </div>
                    </div>
                    @else
                    <h1>You are not access this File</h1>
                    @endif




                </div>
                <div class="col-md-4">
                    <div class="single-video-right">
                        <div class="row">
                            <div class="col-md-12">





                            </div>



                           <div class="col-md-12">


                                @foreach ($videos_category_data as $videos_category_data_show)
                                    @php
                                        $url = regularModules::convertSlugIntoUrl($videos_category_data_show->vod_category_slug);
                                    @endphp
                                    @php
                                        $getID3 = new \getID3();
                                        $file = $getID3->analyze('storage/media/' . $videos_category_data_show->file_name);
                                            if(!empty($file['playtime_seconds'])){
                                        $duration = gmdate('H:i:s.v', $file['playtime_seconds']);
                                       }else{
                                        $duration = 0;

                                       }

                                    @endphp


                                    <div class="video-card video-card-list">
                                        <div class="video-card-image">
                                            <a class="play-icon"
                                                href="{{ url('videos/' . $url . '/' . $videos_category_data_show->id) }}"><i
                                                    class="fas fa-play-circle"></i></a>
                                            <a href="{{ url('videos/' . $url . '/' . $videos_category_data_show->id) }}">
                                                @if (!empty($videos_category_data_show->thumbnail))
                                                    <img class="img-fluid" src="{{ url('storage/media/' . $videos_category_data_show->thumbnail) }}" alt="" >
                                                @else
                                                    <img class="img-fluid" src="{{ asset('dist/img/noimage.png') }}"
                                                        alt="">
                                                @endif
                                            </a>
                                            <div class="time">{{ $duration }}</div>
                                        </div>
                                        <div class="video-card-body">
                                            @can('edit_video')
                                            <div class="btn-group float-right right-action">

                                                <a href="{{ url('videos/' . $url . '/' . $videos_category_data_show->id) }}" class="right-action-link text-gray" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ url('upload-media/'.$videos_category_data_show->id) }}"><i class="fas fa-fw fa-edit"></i>
                                                        &nbsp; Edit</a>

                                                    <a class="dropdown-item" href="#"><i
                                                            class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                                </div>


                                            </div>
                                            @endcan
                                            <div class="video-title">
                                                <a href="#">{{ $videos_category_data_show->title }}</a>
                                            </div>
                                            <div class="video-page text-success">
                                                Education <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                                    data-original-title="Verified"><i
                                                        class="fas fa-check-circle text-success"></i></a>
                                            </div>
                                            <div class="video-view">
                                                {{ $views_count }} views &nbsp;<i class="fas fa-calendar-alt"></i> {{ $videos_category_data_show->created_at }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach





                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
