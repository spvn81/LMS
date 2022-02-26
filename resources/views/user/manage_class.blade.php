@extends('user.layout')



@section('main_section')
@section('page_title','Mnage class')
@section('main_title','Mnage class')
@section('main_title_active','Mnage class')
@section('linkste-create-class','active')
@section('linkste-mnage-class','active')


<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">





            <div class="col-3 col-sm-12 col-md-3">
                <a href="{{ url('create-class') }}"><button type="button"
                        class="btn btn-block bg-gradient-success btn-flat">Back</button></a>
            </div>



            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="manage_category" class="text-capitalize" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">


                            <div class="form-group">
                                <label for="categories_slug">parent category</label>
                                <select class="form-control" name="Category_id">
                                    @php
                                    $selected= '';
                                    @endphp
                                    @foreach ($category as $category_data )
                                    if($Category_id==$category_data->id){
                                    $selected = 'selected';
                                    }else{
                                    $selected = '';
                                    }
                                    @endphp


                                    <option {{ $selected }} value="{{ $category_data->id }}">{{
                                        $category_data->categories }}</option>

                                    @endforeach

                                </select>


                            </div>




                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="{{ $date }}" placeholder="Enter Date">
                                <span id="date-error" class="error"></span>
                            </div>


                            <div class="form-group">
                                <label for="categories_slug">from</label>
                                <input type="time" class="form-control" id="from" name="from" value="{{ $from }}"
                                    placeholder="Enter from time">
                                <span id="categories_slug-error" class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="to">to</label>
                                <input type="time" class="form-control" id="date" name="to" value="{{ $to }}"
                                    placeholder="Enter to">
                                <span id="to-error" class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="subject">subject</label>
                                <input type="text" class="form-control" id="subject" name="subject"
                                    value="{{ $subject }}" placeholder="Enter subject">
                                <span id="to-error" class="error"></span>
                            </div>


                            <div class="form-group">
                                <label for="subject">meeting url</label>
                                <input type="text" class="form-control" id="meeting_url" name="meeting_url"
                                    value="{{ $meeting_url }}" placeholder="Enter meeting url">
                                <span id="to-error" class="error"></span>
                            </div>


                            <div class="form-group">
                                <label for="subject">session name</label>
                                <input type="text" class="form-control" id="session_name" name="session_name"
                                    value="{{ $session_name }}" placeholder="Enter Session name">
                                <span id="to-error" class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="subject">session description</label>
                                <input type="text" class="form-control" id="session_description"
                                    name="session_description" value="{{ $session_description }}"
                                    placeholder="Enter session description">
                                <span id="to-error" class="error"></span>
                            </div>


                            <div class="form-group">
                                <label for="subject">host by</label>

                                <select class="form-control"  id="host_by" name="host_by">
                                    <option value=''>--SELECT--</option>
                                        @foreach ($get_host as $get_host_data )
                                    @php
                                        if($get_host_data->id==$host_by){
                                            $selected ='selected';
                                        }else{
                                            $selected ='';

                                        }
                                    @endphp

                                        <option {{ $selected }} value="{{ $get_host_data->id }}">{{ $get_host_data->name }}</option>
                                       @endforeach

                                </select>

                            </div>


                            <div class="form-group">
                                <label for="subject">additional teachers</label>
                                <input type="text" class="form-control" id="additional_teachers" name="additional_teachers"
                                    value="{{ $additional_teachers }}" placeholder="Enter Host name">
                                <span id="to-error" class="error"></span>
                            </div>


                            <div class="form-group">
                                <label for="thumbnail">class thumbnail</label>
                                <input type="file" class="form-control" id="class_thumbnail" name="class_thumbnail">

                            </div>



                            <div class="form-group">
                                <label for="subject">Alert</label>
                                <input type="checkbox" id="alert" name="alert" value="1">
                                <span id="to-error" class="error"></span>
                            </div>



                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id }}">


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
        var manage_class = new FormData($(this)[0])
        $.ajax({
            type: "post",
            Headers: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            url: '/manage-class/process',
            data: manage_class,
            success: function(data) {

                if (data.success){

                    toastr.success(data.success)
                     setTimeout(function(){
                        window.location.href = '/create-class'
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
