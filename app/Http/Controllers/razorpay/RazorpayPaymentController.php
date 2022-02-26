<?php

namespace App\Http\Controllers\razorpay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;
use Exception;
use App\Models\plan;
use App\Models\purchaseHistory;
use Dirape\Token\Token;
use Illuminate\Support\Str;
use App\Models\planSubscription;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;




class RazorpayPaymentController extends Controller
{


    public function store(Request $request){


            $input = $request->all();

            $api = new Api('rzp_test_axsDqHxStPHTRC', 'OvnRQoPBPCCCPGvgNKGY7cPn');

            $payment = $api->payment->fetch($input['razorpay_payment_id']);

            if(count($input)  && !empty($input['razorpay_payment_id'])) {
                try {
                    $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                    $uid = auth()->user()->id;
                    $random = strtoupper(Str::random(6));
                    $now = \Carbon\Carbon::now()->timestamp;
                    $order_id = $random.$uid.$now;
                    $token = Str::random(256);
                    $purchaseHistory = purchaseHistory::where(['user_id'=> auth()->user()->id])
                    ->where(['payment_status'=>'pending'])
                    ->update(['payment_status'=>'success',
                    'payment_id'=>$response->id,
                    'entity'=>$response->entity,
                    'amount'=>$response->amount/100,
                    'currency'=>$response->currency,
                    'status'=>$response->status,
                    'order_id'=>$order_id,
                    'invoice_id'=>$response->invoice_id,
                    'international'=>$response->international,
                    'method'=>$response->method,
                    'amount_refunded'=>$response->amount_refunded,
                    'refund_status'=>$response->refund_status,
                    'captured'=>$response->captured,
                    'act_token'=> $token,
                    'card_id'=>$response->card_id,

                    'captured'=>$response->captured
                ]);

              return redirect('active-service/'.$order_id.'/'.$token);
                } catch (Exception $e) {
                    $data['status'] =   $e->getMessage();
                    Session::flash('error',$e->getMessage());

                }
            }


    }
}
