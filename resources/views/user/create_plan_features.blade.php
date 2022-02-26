@extends('user.layout')

@section('main_section')
@section('page_title','create Plan features')
@section('main_title','create Plan features')
@section('main_title_active','create Plan features')
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
        <a href="{{ url('manage-plan-features') }}"><button type="button" class="btn btn-block bg-gradient-success btn-flat">Create Plan features</button></a>
        </div>



        <div class="col-12">
        <div class="card-body">
            <table id="create_plan_features_table" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Id</th>
                <th>plan id</th>
                <th>slug </th>
                <th>name</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>



           @foreach($plan_features as $plan_features_data )

                <tr  id="{{ $plan_features_data->id }}">
                    <td>{{  $plan_features_data->plan_id  }}</td>

                  <td>{{  $plan_features_data->id }}</td>
                  <td>{{  $plan_features_data->slug  }}</td>
                  <td>{!! $plan_features_data->name !!}</td>
                  <td>
                      <div class="row text-capitalize">

                        <div class="col-md-4">
                          {!! CustomBackEnd::getEdit('/manage-plan-features/'.$plan_features_data->id) !!}
                         </div>
                         <div class="col-md-4">
                          {!!  CustomBackEnd::get_delete($plan_features_data->id) !!}
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
        $('#create_plan_features_table').DataTable();
    } );

function delete_data(id){
   var del =  confirm("Want to delete?");
   if(del==true){
        delete_table_data(id,'/create-plan-features/delete','danger')
   }else{

   }
}

  </script>



@endpush
