@extends('user.video.layout')
@php
use App\Helpers\regularModules;
@endphp
@section('mytube_main_section')



<div class="container-fluid">
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
                    <h6>Categories</h6>
                </div>
            </div>


            @foreach ($get_all_categories as  $get_all_categories_data)

            @php
            $url =   regularModules::convertSlugIntoUrl($get_all_categories_data->vod_category_slug);
              @endphp

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="category-item mt-0 mb-0">
                    <a href="{{ url('/categories/'.$url) }}">
                        @if($get_all_categories_data->image)
                        <img class="img-fluid" src="{{ url('storage/'.$get_all_categories_data->image) }}" alt="">
                        @else
                        <img class="img-fluid" src="{{ asset('dist/img/noimage.png') }}" alt="">

                        @endif

                        <h6>{{ $get_all_categories_data->vod_category_name }} <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></h6>

                    </a>
                </div>
            </div>
            @endforeach









        </div>


        {{ $get_all_categories->links('vendor.pagination.custom_pagination') }}




    </div>
</div>



@endsection
