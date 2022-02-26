@extends('user.layout')



@section('main_section')
@section('page_title','Mnage plan')
@section('main_title','Mnage plan')
@section('main_title_active', 'Mnage plan')
@section('packages','active')
@php
use App\Helpers\CustomBackEnd;
use App\Helpers\regularModules;
@endphp



<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 col-sm-12 col-md-3">
                <a href="{{ url('create-plan') }}"><button type="button"
                        class="btn btn-block bg-gradient-success btn-flat">Back</button></a>
            </div>



            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="plan_form" class="text-capitalize" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="category_id">categories</label>
                                        <select name="category_id" class="form-control">
                                            <option value="">--SELECT--</option>
                                            @foreach ($category_data as  $category_data_view)
                                            @php
                                                if($category_id==$category_data_view->id){
                                                    $selected = 'selected';
                                                }else{
                                                    $selected = '';

                                                }
                                            @endphp

                                            <option  {{ $selected }} value="{{ $category_data_view->id }}">{{ $category_data_view->categories }}</option>
                                            @endforeach

                                        </select>
                                    </div>



                                    <div class="form-group">
                                        <label for="slug">slug</label>
                                        <input type="text" name="slug" value="{{ $slug  }}" class="form-control"
                                            placeholder="Enter slug  Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Package name</label>

                                        <textarea name="name" id="name" placeholder="Enter name"
                                            class="form-control">{!! $name !!} </textarea>

                                    </div>

                                    <div class="form-group">
                                        <label for="description">description</label>
                                        <textarea name="description" id="description" placeholder="Enter description"
                                            class="form-control">{!!  $description !!} </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">price</label>
                                        <input type="number" min="0" name="price" value="{{ $price }}"
                                            class="form-control" id="price">
                                    </div>



                                    <div class="form-group">
                                        <label for="signup_fee">signup fee</label>
                                        <input type="number" min="0" name="signup_fee" value="{{ $signup_fee }}"
                                            class="form-control" id="signup_fee">
                                    </div>

                                    <div class="form-group">
                                        <label for="currency">currency</label>
                                        <select class="form-control" name="currency">
                                            <option value="INR">INR</option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="Fullname">trial period</label>
                                        <input type="number" min="0" name="trial_period" value="{{ $trial_period }}"
                                            class="form-control" id="trial_period">
                                    </div>


                                    <div class="form-group">
                                        <label for="Fullname">trial interval</label>
                                        <input type="text" name="trial_interval" value="{{ $trial_interval }}"
                                            class="form-control" id="trial_interval" placeholder="Enter trial interval">
                                    </div>
                                    <div class="form-group">
                                        <label for="Fullname">invoice period</label>
                                        <input type="number" min="1" name="invoice_period" value="{{ $invoice_period }}"
                                            class="form-control" id="invoice_period">
                                    </div>


                                    <div class="form-group">
                                        <label for="invoice_interval">invoice interval</label>
                                        <input type="number" min="1" name="invoice_interval" value="{{ $invoice_interval }}"
                                            class="form-control" id="invoice_interval">
                                    </div>

                                    <div class="form-group">
                                        <label for="Fullname">grace period</label>
                                        <input type="number" min="1" name="grace_period" value="{{ $grace_period }}"
                                            class="form-control" id="grace_period">
                                    </div>




                                    <div class="form-group">
                                        <label for="grace_interval">grace interval</label>
                                        <input type="text" name="grace_interval" value="{{ $grace_interval }}"
                                            class="form-control" id="name" placeholder="Enter grace interval">
                                    </div>

                                    <div class="form-group">
                                        <label for="prorate_day">prorate day</label>
                                        <input type="number" min="0" name="prorate_day" value="{{ $prorate_day }}"
                                            class="form-control" id="prorate_day">
                                    </div>



                                    <div class="form-group">
                                        <label for="prorate_period">prorate period</label>
                                        <input type="number" min="0" name="prorate_period" value="{{ $prorate_period }}"
                                            class="form-control" id="prorate_period">
                                    </div>


                                    <div class="form-group">
                                        <label for="prorate_extend_due">prorate extend due</label>
                                        <input type="number" min="0" name="prorate_extend_due"
                                            value="{{ $prorate_extend_due }}" class="form-control"
                                            id="prorate_extend_due">
                                    </div>



                                    <div class="form-group">
                                        <label for="active_subscribers_limit">active subscribers limit</label>
                                        <input type="number" min="0" name="active_subscribers_limit"
                                            value="{{ $active_subscribers_limit }}" class="form-control"
                                            id="active_subscribers_limit">
                                    </div>

                                    <div class="form-group">

                                        <label for="image">image</label>
                                        <input type="file"  name="image" class="form-control" id="image">


                                        {{--  <div class="row">
                                            @if(!empty($images))

                                            @foreach ($images as $avatar_data )


                                              <div class="col-sm-2">
                                                <a href="{{ $avatar_data->url }}" data-toggle="lightbox" data-gallery="gallery">
                                                  <img src="{{ $avatar_data->url }}" class="img-fluid mb-2" alt="white sample"/ style="width: 100px;height:100px">
                                                </a>

                                                {!!  CustomBackEnd::get_delete($avatar_data->id) !!}

                                              </div>


                                              @endforeach
                                              @endif

                                          </div>  --}}



                                    </div>








                                    <div class="form-group">
                                        <label for="sort_order">sort order</label>
                                        <input type="number" min="0" name="sort_order" value="{{ $sort_order }}"
                                            class="form-control" id="sort_order">
                                    </div>
                                    @php
                                        if($is_pop_up==1){
                                            $cks = 'checked';
                                        }else{
                                            $cks = '';

                                        }
                                    @endphp

                                    <div class="form-group">
                                        <label for="is_pop_up">add offers box</label>
                                        <input type="checkbox" {{ $cks }} name="is_pop_up" value="1"

                                    </div>



                                    <input type="hidden" value="{{ $id }}" name="id">








                                </div>
                            </div>
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
    $("#plan_form").submit(function(e) {
        e.preventDefault();
        var plan_form = new FormData($(this)[0])
        $.ajax({
            type: "post",
            Headers: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            url: '/manage-plan/process',
            data: plan_form,
            success: function(data) {

                if(data.errors){

                    $.each(data.errors,function(key,value){
                        toastr.error(value)
                    })



                }else{
                $("#role-error").html(' ')



                toastr.success(data.success)
                setTimeout(function(){
                 //  window.location.href = '/create-roles'
               }, 2000);


                }

            },
            contentType: false,
            processData: false,
            cache: false,

        });

    })




    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });


    $(['#description','#name']).summernote({
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']]
        ]
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
