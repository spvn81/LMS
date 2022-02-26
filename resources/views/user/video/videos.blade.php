@extends('user.video.layout')
@php
use App\Helpers\regularModules;
@endphp
@section('mytube_main_section')




<div class="container-fluid pb-0">
    <hr>


    <div class="video-block section-padding">
        <div class="row">
            <div class="col-md-12">
                <div class="main-title">
                    <div class="btn-group float-right right-action">
                        <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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




          @foreach ($videos_category_data as $video_libraries_is_featured_data )

          @php
          $url =   regularModules::convertSlugIntoUrl($video_libraries_is_featured_data->vod_category_slug)
            @endphp


          <div class="col-xl-3 col-sm-6 mb-3">
             <div class="video-card">
                <div class="video-card-image">
                   <a class="play-icon" href="{{ url('videos/'.$url.'/'.$video_libraries_is_featured_data->id) }}"><i class="fas fa-play-circle"></i></a>
                   <a href="{{ url('videos/'.$url.'/'.$video_libraries_is_featured_data->id) }}">
                       @if(!empty($video_libraries_is_featured_data->thumbnail))
                       <img class="img-fluid" src="{{ url('storage/media/'.$video_libraries_is_featured_data->thumbnail) }}" alt="" style="width:360px; height:240px;">
                       @else
                       <img class="img-fluid" src="{{asset('dist/img/noimage.png')}}" alt="" style="width:360px; height:240px;">

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



                   <div class="time">{{  $duration }}</div>
                </div>
                <div class="video-card-body">
                   <div class="video-title">
                      <a href="#">{{ substr($video_libraries_is_featured_data->title,0,44) }}</a>
                   </div>
                   <div class="video-page text-success">
                      {{ $video_libraries_is_featured_data->vod_category_name }}
                       <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified">
                          <i class="fas fa-check-circle text-success"></i>
                        </a>
                   </div>
                   <div class="video-view">
                   {{--  1.8M views &nbsp;  --}}
                  {{--   <i class="fas fa-calendar-alt"></i> 11 Months ago  --}}
                   </div>
                </div>
             </div>
          </div>
          @endforeach




        </div>
    </div>
</div>



@endsection
