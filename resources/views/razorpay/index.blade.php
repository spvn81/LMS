<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel - Razorpay Payment Gateway Integration</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .razorpay-payment-button {
            display: none
        }


        body {
            background-color: #eee
        }

        .container {
            height: 100vh
        }

        .card {
            border: none
        }

        .form-control {
            border-bottom: 2px solid #eee !important;
            border: none;
            font-weight: 600
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #8bbafe;
            outline: 0;
            box-shadow: none;
            border-radius: 0px;
            border-bottom: 2px solid blue !important
        }

        .inputbox {
            position: relative;
            margin-bottom: 20px;
            width: 100%
        }

        .inputbox span {
            position: absolute;
            top: 7px;
            left: 11px;
            transition: 0.5s
        }

        .inputbox i {
            position: absolute;
            top: 13px;
            right: 8px;
            transition: 0.5s;
            color: #3F51B5
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0
        }

        .inputbox input:focus~span {
            transform: translateX(-0px) translateY(-15px);
            font-size: 12px
        }

        .inputbox input:valid~span {
            transform: translateX(-0px) translateY(-15px);
            font-size: 12px
        }

        .card-blue {
            background-color: #492bc4
        }

        .hightlight {
            background-color: #5737d9;
            padding: 10px;
            border-radius: 10px;
            margin-top: 15px;
            font-size: 14px
        }

        .yellow {
            color: #fdcc49
        }

        .decoration {
            text-decoration: none;
            font-size: 14px
        }

        .btn-success {
            color: #fff;
            background-color: #492bc4;
            border-color: #492bc4
        }

        .btn-success:hover {
            color: #fff;
            background-color: #492bc4;
            border-color: #492bc4
        }

        .decoration:hover {
            text-decoration: none;
            color: #fdcc49
        }


    </style>

</head>

<body>
    <div id="app">





        <div class="container mt-5 px-5">
            <div class="mb-4">
                <h2>Confirm order and pay</h2> <span>please make the payment, after that you can enjoy all the features
                    and benefits.</span>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card p-3">
                        <h6 class="text-uppercase">Payment details</h6>
                          <div class="inputbox mt-3"> <input type="text" name="email" class="form-control"
                                required="required" value="{{ Auth::user()->email }}" readonly>
                             </div>

                             <div class="inputbox mt-3"> <input type="text"  class="form-control"
                                required="required" value="{!! $slug !!}" readonly>
                             </div>






                    </div>

                    <form action="{{ route('razorpay.payment.store') }}" method="POST">
                        @csrf
                        <div class="mt-4 mb-4 d-flex justify-content-between"> <span>Previous step</span> <button
                                class="btn btn-success px-3"> INR {{ $price }}</button> </div>

                        <script src="https://checkout.razorpay.com/v1/checkout.js" class="stripe-button"
                            data-key="rzp_test_axsDqHxStPHTRC" data-amount="{{  $price*100 }}" data-buttontext="Pay {{  $price }} INR"
                            data-name="ItSolutionStuff.com" data-payment_button_id="pl_IyzcflroSnNTFD"
                            data-description="Rozerpay"

                            data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png"
                            data-prefill.name="name" data-prefill.email="email" data-theme.color="#ff7529">
                        </script>
                    </form>



                </div>
                <div class="col-md-4">
                    <div class="card card-blue p-3 text-white mb-3"> <span>You have to pay</span>
                        <div class="d-flex flex-row align-items-end mb-3">
                            <h1 class="mb-0 yellow">{{  $price }}</h1>
                        </div> <span>Enjoy all the features and perk after you complete the payment</span> <a href="#"
                            class="yellow decoration">Know all the features</a>
                        <div class="hightlight"> <span>100% Guaranteed support and update for the next 5 years.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>







    </div>
</body>

</html>
