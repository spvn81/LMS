@extends('user.layout')

@section('main_section')
@section('page_title','video categories')
@section('main_title','video categories')
@section('main_title_active','video categories')
@section('linkste-video','active')
<meta name="csrf-token" content="{{ csrf_token() }}">

@php
    use App\Helpers\CustomBackEnd;
    use App\Helpers\regularModules;

@endphp


<!-- Main content -->
<div class="content">
  <div class="container-fluid">

    {!!regularModules::defaultNotification('info')  !!}


    <div class="msg"></div>


    <div class="row">

        <div class="col-3 col-sm-12 col-md-3">
        <a href="{{ url('/manage-video-category') }}"><button type="button" class="btn btn-block bg-gradient-success btn-flat">Create category</button></a>
        </div>






        <div class="col-12">
        <div class="card-body">
            <table id="vod_categoty_table" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Id</th>
                <th>category</th>
                <th>category slug</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                 @foreach($video_category as $category_data )

              <tr  id="{{ $category_data->id }}">
                <td>{{  $category_data->id }}</td>
                <td>{{  $category_data->vod_category_name }}</td>
                <td>{{  $category_data->vod_category_slug }}</td>
                <td>

                    <div class="row text-capitalize">
                        <div class="col-md-3">

                        {!!   CustomBackEnd::get_status($category_data->vod_category_status,'/video-categories/status/'.$category_data->id) !!}
                        </div>
                        <div class="col-md-3">
                            {!! CustomBackEnd::getEdit('/manage-video-category/'.$category_data->id) !!}
                         </div>

                         <div class="col-md-3">

                         {!!  CustomBackEnd::get_delete($category_data->id) !!}

                         </div>
                         <div class="col-md-3">
                            @if($category_data->is_premium==1)
                            <a href="{{ url('/config-video-premium/'.$category_data->id) }}"><button type="button" class="btn btn-block bg-gradient-success btn-sm">Config</button></a>

                            @endif
                         </div>
                      </div>



                </td>




              </tr>
              @endforeach





            </table>
          </div>


        </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>



@endsection

@push('backend_scripts')

<script>
    $(function () {
      $("#vod_categoty_table").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

function delete_data(id){
   var del =  confirm("Want to delete?");
   if(del==true){
        delete_table_data(id,'/video-categories/delete','danger')

   }else{

   }
}





  </script>



@endpush
