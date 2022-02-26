@extends('user.layout')

@section('main_section')
@section('page_title','manage video category')
@section('main_title','manage video category')
@section('main_title_active','manage video category')
@section('linkste-video','active')

@php
use App\Helpers\CustomBackEnd;
use App\Helpers\regularModules;
@endphp


<!-- Main content -->
<div class="content">
  <div class="container-fluid">

    <div class="row">





        <div class="col-3 col-sm-12 col-md-3">
            <a href="{{ url('video-category') }}">
                <button type="button" class="btn btn-block bg-gradient-success btn-flat">Back</button>
            </a>
            </div>


        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">

              <!-- /.card-header -->
              <!-- form start -->
              <form id="manage_category">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="Category">Category</label>
                    <input type="text" class="form-control" id="vod_category_name" name="vod_category_name" value="{{ $vod_category_name }}" placeholder="Enter Category name">
                    <span id="categories-error" class="error"></span>

                </div>

                  <div class="form-group">
                    <label for="categories_slug">Category slug</label>
                    <input type="text" class="form-control" id="vod_category_slug"  name="vod_category_slug" value="{{ $vod_category_slug }}" placeholder="Enter Category slug">
                    <span id="categories_slug-error" class="error"></span>
                    </div>
                    @php
                            if($is_premium==1){
                                    $check = "checked";
                            }else{
                                $check = "";

                            }
                    @endphp

                    <div class="form-group">
                        <label for="categories_slug">Add Premium</label>
                        <input type="checkbox" {{ $check }}  id="is_premium"  name="is_premium" value="1" >
                        </div>



                    <div class="form-group">

                        <div id="app">
                            <file-uploader
                                    :unlimited="false"
                                    collection="avatars"
                                    :tokens="{{ json_encode(old('media', [])) }}"
                                    label="category Image"
                                    notes="Supported types: jpeg, png,jpg,gif"
                                    accept="image/jpeg,image/png,image/jpg,image/gif"
                            ></file-uploader>
                        </div>

                      </div>


                      <div class="row">
                        @if(!empty($avatar))

                      @foreach ($avatar as $avatar_data )


                        <div class="col-sm-2">
                          <a href="{{ $avatar_data->url }}" data-toggle="lightbox" data-gallery="gallery">
                            <img src="{{ $avatar_data->url }}" class="img-fluid mb-2" alt="white sample"/ style="width: 100px;height:100px">
                          </a>

                          {!!  CustomBackEnd::get_delete($avatar_data->id) !!}
                      {!! CustomBackEnd::active_image($image,'/manage-video-category/status-image/'.$avatar_data->id.'/'.$id) !!}


                        </div>


                        @endforeach
                        @endif

                    </div>







                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="id" value="{{ $id }}">

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->



          </div>




    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>

@push('backend_scripts')

<script>

    $("#manage_category").submit(function(e) {
        e.preventDefault();
        var manage_category = new FormData($(this)[0])
        $.ajax({
            type: "post",
            Headers: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            url: '/manage-video-category/process',
            data: manage_category,
            success: function(data) {

                $("#categories-error").html(' ')
                $("#categories_slug-error").html(' ')

                if(data.errors){
                    $("#categories-error").html(data.errors.vod_category_name)
                    $("#categories_slug-error").html(data.errors.vod_category_slug)


                }else{
                $("#categories-error").html(' ')
                $("#categories_slug-error").html(' ')

                window.location.href = '/video-category'

                }

            },
            contentType: false,
            processData: false,
            cache: false,

        });

    })



    new Vue({
        el: '#app'
      })


      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });


      function delete_data(id){
        var del =  confirm("Want to delete?");
        if(del==true){
            delete_table_data_with_method(id,'/api/uploader/media/'+id,'danger','DELETE')
        }else{

        }
     }



</script>


@endpush

@endsection
