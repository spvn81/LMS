@extends('user.layout')



@section('main_section')
@section('page_title','manage files')
@section('main_title','manage files')
@section('main_title_active','manage files')
@section('linkste-manage-files','active')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<!-- Main content -->
<div class="content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-body">

                        <form id="uploadForm" enctype="multipart/form-data">
                            @csrf




                            <div class="form-group">
                                <div class="custom-control">
                                    <label>video category</label>
                                   <select class="form-control" name="video_category_id">
                                       <option value="">--SELECT--</option>
                                       @foreach ($video_category as $video_category_data )
                                       <option value="{{ $video_category_data->id }}">{{ $video_category_data->vod_category_name }}</option>
                                       @endforeach

                                   </select>
                                </div>
                            </div>





                            <div class="form-group">
                                <div class="custom-control">
                                    <label>title</label>
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="custom-control">
                                    <label>description</label>
                                    <textarea  name="description" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-control">
                                    <label>Upload thumbnail:</label>
                                    <input type="file" class="form-control" name="thumbnail" id="thumbnail">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="custom-control">
                                    <label>cast:</label>

                                    <textarea  class="form-control" name="cast"></textarea>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="custom-control">
                                    <label>Upload Video:</label>
                                    <input type="file" class="form-control" name="file" id="fileInput">
                                </div>
                            </div>
                            <div class="row">

                            <div class="form-group">
                                <div class="custom-control">
                                    <label>Add Featured:</label>
                                    <input type="checkbox" name="is_featured" value="1">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-control">
                                    <label>Add Premium:</label>
                                    <input type="checkbox" name="is_premium" value="1">
                                </div>
                            </div>
                        </div>


                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <div class="form-group">

                            <div id="progress_bar"></div>



                                <!-- Display upload status -->
                                <div id="uploadStatus"></div>
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>




                    </div>
                </div>
            </div>
        </div>



        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@push('backend_scripts')






<script>
    $(document).ready(function(){
        // File upload via Ajax
        $("#uploadForm").on('submit', function(e){
            e.preventDefault();

            $("#progress_bar").html('<div class="progress"><div class="progress-bar"></div></div>')

            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = ((evt.loaded / evt.total) * 100);
                            $(".progress-bar").width(Math.round(percentComplete) + '%');
                            $(".progress-bar").html( Math.round(percentComplete)+'%');
                        }
                    }, false);
                    return xhr;
                },

                Headers: {
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                },
                type: 'POST',
                url: '/upload-files',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    $(".progress-bar").width('0%');
                   $('#uploadStatus').html('<img src="{{ asset('dist/img/hug.gif' ) }}" style="width:100px">');
                },
                error:function(){
                    $('#uploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
                },
                success: function(resp){

                    if(resp.errors){
                        $.each(resp.errors,function(key,value){
                            $('#uploadStatus').html(' ')
                            $("#progress_bar").html('')
                            toastr.error(value)
                        })

                    }else{
                        if(resp.status == 'ok'){
                            $('#uploadForm')[0].reset();
                            $('#uploadStatus').html('<p style="color:#28A74B;">File has uploaded successfully!</p>');
                        }else if(resp == 'err'){


                            $('#uploadStatus').html('<p style="color:#EA4335;">Please select a valid file to upload.</p>');
                        }

                    }



                }
            });
        });

        // File type validation
        $("#fileInput").change(function(){
            var allowedTypes = ['video/mp4'];
            var file = this.files[0];
            var fileType = file.type;
            if(!allowedTypes.includes(fileType)){
                alert('Please select a valid file (mp4).');
                $("#fileInput").val('');
                return false;
            }
        });
    });
</script>







@endpush

@endsection
