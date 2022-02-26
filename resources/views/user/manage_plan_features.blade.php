@extends('user.layout')



@section('main_section')
@section('page_title','Mnage plan features')
@section('main_title','Mnage plan features')
@section('main_title_active', 'Mnage plan features')
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
                <a href="{{ url('create-plan-features') }}"><button type="button"
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
                                        <label for="slug">plan id </label>
                                        <select class="form-control" name="plan_id">

                                            @foreach ($plans as $plans_data )
                                            @php
                                            if($plan_id==$plans_data->id){
                                            $sel = 'selected';
                                            }else{
                                            $sel = '';

                                            }

                                            @endphp

                                            <option {{ $sel }} value=" {{ $plans_data->id  }}"> {!! $plans_data->name
                                                !!}</option>
                                            @endforeach
                                        </select>
                                    </div>




                                    <div class="form-group">
                                        <label for="slug">slug </label>
                                        <input type="text" min="0" name="slug" value="{{ $slug }}" class="form-control"
                                            id="slug">
                                    </div>





                                    <div class="form-group">
                                        <label for="name">name</label>
                                        <textarea name="name" id="name" placeholder="Enter Name"
                                            class="form-control">{!!  $name !!} </textarea>
                                    </div>







                                    <div class="form-group">
                                        <label for="description">description</label>
                                        <textarea name="description" id="description" placeholder="Enter description"
                                            class="form-control">{!!  $description !!} </textarea>
                                    </div>




                                    <div class="form-group">
                                        <label for="value">value</label>
                                        <input type="text" min="0" name="signup_fee" value="{{ $value }}"
                                            class="form-control" id="value">
                                    </div>



                                    <div class="form-group">
                                        <label for="value">resettable period</label>
                                        <input type="number" min="0" name="resettable_period"
                                            value="{{ $resettable_period }}" class="form-control"
                                            id="resettable_period">
                                    </div>



                                    <div class="form-group">
                                        <label for="Fullname">resettable interval</label>
                                        <input type="text" min="0" name="resettable_interval"
                                            value="{{ $resettable_interval }}" class="form-control"
                                            id="resettable_interval">
                                    </div>



                                    <div class="form-group">
                                        <label for="Fullname">sort order</label>
                                        <input type="number" min="1" name="sort_order" value="{{ $sort_order }}"
                                            class="form-control" id="sort_order">
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
            url: '/manage-plan-features/process',
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
                  window.location.href = '/create-plan-features'
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


      new Vue({
        el: '#app'
      })


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
