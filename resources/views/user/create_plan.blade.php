@extends('user.layout')

@section('main_section')
@section('page_title','create Plan')
@section('main_title','create Plan')
@section('main_title_active','create Plan')
@section('packages','active')
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
        <a href="{{ url('manage-plan') }}"><button type="button" class="btn btn-block bg-gradient-success btn-flat">Create Plan</button></a>
        </div>



        <div class="col-12">
        <div class="card-body">
            <table id="create_plan_table" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Id</th>
                <th>slug </th>
                <th>name</th>
                <th>price</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>



           @foreach($create_plan as $create_plan_data )

                <tr  id="{{ $create_plan_data->id }}">
                  <td>{{  $create_plan_data->id }}</td>
                  <td>{{  $create_plan_data->slug  }}</td>
                  <td>{!! $create_plan_data->name !!}</td>
                  <td>{{  $create_plan_data->price }}</td>
                  <td>
                      <div class="row text-capitalize">
                        <div class="col-md-4">
                            {!! CustomBackEnd::get_status($create_plan_data->is_active,'/manage-plan/status/'.$create_plan_data->id) !!}
                           </div>
                        <div class="col-md-4">
                          {!! CustomBackEnd::getEdit('/manage-plan/'.$create_plan_data->id) !!}
                         </div>
                         <div class="col-md-4">
                          {!!  CustomBackEnd::get_delete($create_plan_data->id) !!}
                         </div>
                      </div>
                  </td>




                </tr>
                @endforeach




              </tbody>


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

    $(document).ready( function () {
        $('#create_plan_table').DataTable();
    } );

function delete_data(id){
   var del =  confirm("Want to delete?");
   if(del==true){
        delete_table_data(id,'/create-plan/delete','danger')
   }else{

   }
}

  </script>



@endpush
