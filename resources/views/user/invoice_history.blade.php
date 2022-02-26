@extends('user.layout')

@section('main_section')
@section('page_title','invoice history')
@section('main_title','invoice history')
@section('main_title_active','invoice history')
@section('linkste-profile','active')
<meta name="csrf-token" content="{{ csrf_token() }}">

@php
use App\Helpers\CustomBackEnd;
use App\Helpers\regularModules;

@endphp


<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        {!!regularModules::defaultNotification('info') !!}


        <div class="msg"></div>


        <div class="row">




            <div class="col-12">
                <div class="card-body">
                    <table id="menu_table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>plan</th>
                                <th>Order id</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoice_history as $invoice_history_data )

                            <tr id="{{ $invoice_history_data->id }}">
                                <td>{{ $invoice_history_data->id }}</td>
                                <td>{{ $invoice_history_data->plan_slug }}</td>
                                <td>{{ $invoice_history_data->order_id }}</td>
                                <td>{{ $invoice_history_data->starts_at }}</td>
                                <td>{{ $invoice_history_data->ends_at }}</td>
                                <td>{{ $invoice_history_data->amount }}</td>

                                <td>
                                    @if($invoice_history_data->starts_at<=$invoice_history_data->ends_at && $invoice_history_data->cancels_at==null )
                                        Active
                                        @elseif($invoice_history_data->cancels_at !=null)
                                        @if($invoice_history_data->canceled_at> \Carbon\Carbon::now()->toDateTimeString())
                                       Plan Will Cancelled   : {{ $invoice_history_data->canceled_at }}
                                        @else
                                        Cancelled
                                        @endif
                                        @else
                                        Expired
                                     @endif
                                </td>

                                <td>

                                    <div class="row text-capitalize">

                                        <div class="col-md-4">
                                            <a href="{{ url('payment-invoice/'.$invoice_history_data->order_id) }}">View</a>
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
        delete_table_data(id,'/menu/delete','danger')

   }else{

   }
}





</script>



@endpush
