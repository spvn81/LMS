@extends('user.layout')

@section('main_section')
@section('page_title','categories')
@section('main_title','categories')
@section('main_title_active','categories')
@section('linkste-categories','active')
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
        <a href="{{ url('/manage-category') }}"><button type="button" class="btn btn-block bg-gradient-success btn-flat">Create category</button></a>
        </div>



        <div class="col-12">
        <div class="card-body">
            <table id="categoty_table" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Id</th>
                <th>category</th>
                <th>category slug</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                 @foreach($category as $category_data )

              <tr  id="{{ $category_data->id }}">
                <td>{{  $category_data->id }}</td>
                <td>{{  $category_data->categories }}</td>
                <td>{{  $category_data->categories_slug }}</td>
                <td>

                    <div class="row text-capitalize">
                        <div class="col-md-4">

                        {!!   CustomBackEnd::get_status($category_data->status,'/categories/status/'.$category_data->id) !!}
                        </div>
                        <div class="col-md-4">
                            {!! CustomBackEnd::getEdit('/manage-category/'.$category_data->id) !!}
                         </div>

                         <div class="col-md-4">

                         {!!  CustomBackEnd::get_delete($category_data->id) !!}

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
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

function delete_data(id){
   var del =  confirm("Want to delete?");
   if(del==true){
        delete_table_data(id,'/categories/delete','danger')

   }else{

   }
}





  </script>



@endpush
