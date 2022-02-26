@extends('user.layout')

@section('main_section')
@section('page_title','Config preamium video category')
@section('main_title','Config preamium video category')
@section('main_title_active','Config preamium video category')
@section('linkste-video','active')

@php
use App\Helpers\CustomBackEnd;
use App\Helpers\regularModules;
@endphp


<!-- Main content -->
<div class="content">
  <div class="container-fluid">

    <div class="row">







        <div class="col-md-12">
            <!-- general form elements -->
            <form id="config_primum_v_cat">

                @csrf
            <div class="card card-primary">

              <!-- /.card-header -->
              <!-- form start -->



                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="video_cat_id">video category </label>
                                <input type="text" class="form-control" value="{{ $video_category->vod_category_name }}" disabled>
                                <input type="hidden" name="video_cat_id" value="{{ $video_category->id }}">

                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-12">
                        <div class="card-body text-uppercase text-bold" >
                            @foreach ($plans as  $key=> $plans_data)
                            @php
                                if(!empty($premium_video_categories[$key]) && $premium_video_categories[$key]->package_id==$plans_data->id){
                                    $ck='checked';
                                }else{
                                    $ck='';
                                }
                            @endphp

                            {!! $plans_data->slug  !!}: <input type="checkbox" {{  $ck }} name="package_id[]" value="{{ $plans_data->id }}"> &nbsp;&nbsp;
                            @endforeach

                        </div>
                    </div>
                </div>









              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>

            </div>
        </form>

            <!-- /.card -->



          </div>




    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>

@push('backend_scripts')

<script>

    $("#config_primum_v_cat").submit(function(e) {
        e.preventDefault();
        var config_primum_v_cat = new FormData($(this)[0])
        $.ajax({
            type: "post",
            Headers: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            url: '/config-video-category-premium/process',
            data: config_primum_v_cat,
            success: function(data) {



                if (data.success){

                    toastr.success(data.success)
                     setTimeout(function(){

                    }, 2000);

                }else{
                    $.each(data.errors,function(key,value){
                        toastr.error(value)
                    })

                }

            },
            contentType: false,
            processData: false,
            cache: false,

        });

    })









</script>


@endpush

@endsection
