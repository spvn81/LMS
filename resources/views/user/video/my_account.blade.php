@extends('user.video.layout')
@php
use App\Helpers\regularModules;
@endphp
@section('mytube_main_section')
<meta name="csrf-token" content="{{ csrf_token() }}" />



<div class="container-fluid pb-0">
    <div class="row">


        @foreach ($invoice_history as $invoice_history_data )

        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100 border-none">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-users"></i>
                    </div>
                    <div class="mr-5 text-capitalize">{{ $invoice_history_data->plan_slug }}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1"
                    href="{{ url('plan-details/'.$invoice_history_data->order_id) }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        @endforeach
    </div>



    <hr>
    <div class="video-block section-padding">
        <div class="row">





            @foreach ($my_videos as $my_videos_data )



            @php
            $url = regularModules::convertSlugIntoUrl($my_videos_data->vod_category_slug)
            @endphp

            <div class="col-xl-3 col-sm-6 mb-3" id="{{ $my_videos_data->id }}">
                <div class="video-card">
                    <div class="video-card-image">
                        <a class="play-icon" href="{{ url('videos/'.$url.'/'.$my_videos_data->id) }}"><i
                                class="fas fa-play-circle"></i></a>
                        <a href="{{ url('videos/'.$url.'/'.$my_videos_data->id) }}">
                            @if(!empty($my_videos_data->thumbnail))
                            <img class="img-fluid" src="{{ url('storage/media/'.$my_videos_data->thumbnail) }}" alt=""
                                style="width:360px; height:240px;">
                            @else
                            <img class="img-fluid" src="{{asset('dist/img/noimage.png')}}" alt=""
                                style="width:360px; height:240px;">
                            @endif


                        </a>
                        @php



                        $getID3 = new \getID3;
                        $file = $getID3->analyze( 'storage/media/'.$my_videos_data ->file_name);

                        if(!empty($file['playtime_seconds'])){
                        $duration = gmdate('H:i:s.v', $file['playtime_seconds']);
                        }else{
                        $duration = 0;
                        }
                        @endphp



                        <div class="time">{{ $duration }}</div>
                    </div>
                    <div class="video-card-body">

                        @can('edit_video')
                        <div class="btn-group float-right right-action">

                            <a href="{{ url('videos/' . $url . '/' . $my_videos_data->id) }}"
                                class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ url('upload-media/'.$my_videos_data->id) }}"><i
                                        class="fas fa-fw fa-edit"></i>
                                    &nbsp; Edit</a>
                                <a class="dropdown-item" onclick="deleteVideo({{ $my_videos_data->id }})"><i
                                        class="fas fa-fw fa-trash"></i>
                                    &nbsp; Delete</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp;
                                    Close</a>
                            </div>
                        </div>
                        @endcan


                        <div class="video-title">
                            <a href="#">{{ substr($my_videos_data->title,0,44) }}</a>
                        </div>
                        <div class="video-page text-success">
                            {{ $my_videos_data->vod_category_name }}
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
                    <h6>My Channels</h6>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="channels-card">
                    <div class="channels-card-image">
                        <a href="#"><img class="img-fluid" src="img/s1.png" alt=""></a>
                        <div class="channels-card-image-btn"><button type="button"
                                class="btn btn-danger btn-sm">Subscribe <strong>1.4M</strong></button></div>
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








@push('video_scripts')
<script>
    function deleteVideo(id){



        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this  file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: 'my-account/video/delete',
                data: 'id=' + id,
                success: function(data) {
                        if(data.success=='deleted'){
                    if (willDelete) {
                        swal("Poof! Your imaginary file has been deleted!", {
                          icon: "success",
                        });
                        $('#'+id).remove();

                      }
                    }


                }
            })




          });



    }


</script>

@endpush





@endsection
