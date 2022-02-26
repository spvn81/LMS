@extends('user.layout')

@section('main_section')
@section('page_title','create class')
@section('main_title','create class')
@section('main_title_active','create class')
@section('linkste-create-class','active')
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
        <a href="{{ url('manage-class') }}"><button type="button" class="btn btn-block bg-gradient-success btn-flat">Create class</button></a>
        </div>



        <div class="col-12">
        <div class="card-body">
            <table id="create_onlne_class_table" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Id</th>
                <th>session name</th>
                <th>host by</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>



                @foreach($online_class as $online_class_data )

                <tr  id="{{ $online_class_data->id }}">
                  <td>{{  $online_class_data->id }}</td>
                  <td>{{  $online_class_data->session_name }}</td>
                  <td>{{  $online_class_data->host_by }}</td>
                  <td>
                      <div class="row text-capitalize">
                        <div class="col-md-4">
                            {!! CustomBackEnd::get_status($online_class_data->status,'/manage-class/status/'.$online_class_data->id) !!}
                           </div>
                        <div class="col-md-4">
                          {!! CustomBackEnd::getEdit('/manage-class/'.$online_class_data->id) !!}
                         </div>
                         <div class="col-md-4">
                          {!!  CustomBackEnd::get_delete($online_class_data->id) !!}
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
      $("#create_onlne_class_table").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

function delete_data(id){
   var del =  confirm("Want to delete?");
   if(del==true){
        delete_table_data(id,'/create-class/delete','danger')
   }else{

   }
}

  </script>



@endpush
