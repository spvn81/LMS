@extends('user.layout')

@section('main_section')
@section('page_title','Plan Details')
@section('main_title','Plan Details')
@section('main_title_active','Plan Details')
@section('linkste-invoice','active')
<meta name="csrf-token" content="{{ csrf_token() }}">

@php
    use App\Helpers\CustomBackEnd;
    use App\Helpers\regularModules;

@endphp


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">


                <section class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-header">
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table class="table table-bordered">
                                <tbody>




                                  <tr>
                                    <td>subscriber type</td>
                                    <td>
                                        {{ $subscriber_type }}
                                    </td>
                                  </tr>




                                  <tr>
                                    <td>subscriber_id</td>
                                    <td>
                                        {{ $subscriber_id }}

                                    </td>
                                  </tr>



                                  <tr>
                                    <td>plan_id</td>
                                    <td>
                                        {{ $plan_id }}

                                    </td>
                                  </tr>






                                  <tr>
                                    <td>description</td>
                                    <td>
                                        {{ $description }}

                                    </td>
                                  </tr>





                                  <tr>
                                    <td>trial_ends_at</td>
                                    <td>
                                        {{ $trial_ends_at }}

                                    </td>
                                  </tr>


                                  <tr>
                                    <td>starts_at</td>
                                    <td>
                                        {{ $starts_at }}

                                    </td>
                                  </tr>


                                  <tr>
                                    <td>ends_at</td>
                                    <td>
                                        {{ $ends_at }}

                                    </td>
                                  </tr>




                                  <tr>
                                    <td>cancels_at</td>
                                    <td>
                                        {{ $cancels_at }}

                                    </td>
                                  </tr>





                                  <tr>
                                    <td>canceled_at</td>
                                    <td>
                                        {{ $canceled_at }}

                                    </td>
                                  </tr>






                                  <tr>
                                    <td>timezone</td>
                                    <td>
                                        {{ $timezone }}

                                    </td>
                                  </tr>







                                  <tr>
                                    <td>created_at</td>
                                    <td>
                                        {{ $created_at }}

                                    </td>
                                  </tr>






                                  <tr>
                                    <td>plan_subscriptions_status</td>
                                    <td>
                                        {{ $plan_subscriptions_status }}

                                    </td>
                                  </tr>






                                  <tr>
                                    <td>updated_at</td>
                                    <td>
                                        {{ $updated_at }}

                                    </td>
                                  </tr>







                                  <tr>
                                    <td>plan_slug</td>
                                    <td>
                                        {{ $plan_slug }}

                                    </td>
                                  </tr>






                                  <tr>
                                    <td>user_id</td>
                                    <td>
                                        {{ $user_id }}

                                    </td>
                                  </tr>






                                  <tr>
                                    <td>payment_id</td>
                                    <td>
                                        {{ $payment_id }}

                                    </td>
                                  </tr>





                                  <tr>
                                    <td>entity</td>
                                    <td>
                                        {{ $entity }}

                                    </td>
                                  </tr>




                                  <tr>
                                    <td>amount</td>
                                    <td>
                                        {{ $amount }}

                                    </td>
                                  </tr>





                                  <tr>
                                    <td>currency</td>
                                    <td>
                                        {{ $currency }}

                                    </td>
                                  </tr>




                                  <tr>
                                    <td>status</td>
                                    <td>
                                        {{ $status }}

                                    </td>
                                  </tr>


















                                </tbody>
                              </table>
                            </div>

                          </div>

                        </div>

                      </div>



                    </div><!-- /.container-fluid -->
                  </section>





            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection




