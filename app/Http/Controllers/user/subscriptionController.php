<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Http\Request;
use App\Models\plan;
use App\Models\planFeatures;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use App\Helpers\uploadFiles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\purchaseHistory;
use App\Models\planSubscription;
use Carbon\Carbon;


class subscriptionController extends Controller
{

    function create_plan()
    {
        $data['create_plan'] = plan::All();
        return view('user.create_plan', $data);
    }




    function manage_plan($id = '')
    {
        $data['category_data']  = categories::where(['status' => 1])
            ->where(['category_type' => 'packages'])
            ->get();
        if (!empty($id)) {
            $plan = plan::find($id);
            $data['category_id'] = $plan->category_id;
            $data['slug'] = $plan->slug;
            $data['name'] = $plan->name;
            $data['description'] = $plan->description;
            $data['is_active'] = $plan->is_active;
            $data['price'] = $plan->price;
            $data['signup_fee'] = $plan->signup_fee;
            $data['currency'] = $plan->currency;
            $data['trial_period'] = $plan->trial_period;
            $data['trial_interval'] = $plan->trial_interval;
            $data['invoice_period'] = $plan->invoice_period;
            $data['invoice_interval'] = $plan->invoice_interval;
            $data['grace_period'] = $plan->grace_period;
            $data['grace_interval'] = $plan->grace_interval;
            $data['prorate_day'] = $plan->prorate_day;
            $data['prorate_period'] = $plan->prorate_period;
            $data['prorate_extend_due'] = $plan->prorate_extend_due;
            $data['active_subscribers_limit'] = $plan->active_subscribers_limit;
            $data['sort_order'] = $plan->sort_order;
            $data['id'] = $plan->id;
            $data['images'] = $plan->image;
            $data['is_pop_up'] = $plan->is_pop_up;

        } else {
            $data['category_id'] = '';
            $data['slug'] = '';
            $data['name'] = '';
            $data['description'] = '';
            $data['is_active'] = '';
            $data['price'] = '';
            $data['signup_fee'] = '';
            $data['currency'] = '';
            $data['trial_period'] = '';
            $data['trial_interval'] = '';
            $data['invoice_period'] = '';
            $data['invoice_interval'] = '';
            $data['grace_period'] = '';
            $data['grace_interval'] = '';
            $data['prorate_day'] = '';
            $data['prorate_period'] = '';
            $data['prorate_extend_due'] = '';
            $data['active_subscribers_limit'] = '';
            $data['sort_order'] = '';
            $data['id'] = '';
            $data['images'] = '';
            $data['is_pop_up'] = '';
        }
        return view('user.manage_plan', $data);
    }


    function manage_plan_process(Request $request)
    {


        $id = $request->id;

        $validator = validator::make($request->all(), [
            'slug' => "required|regex:/(^[A-Za-z0-9 ]+$)+/|unique:plans,slug,$id",
            'name' => 'required',
            'price' => 'required',
            'currency' => 'required',
            'invoice_interval' => 'required',
            'category_id' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            if (!empty($id)) {
                $save_data = plan::find($id);
                $msg = 'data Updated';
            } else {
                $save_data = new plan();
                $msg = 'data saved';
            }
            $save_data->slug = $request->slug;

            $save_data->category_id = $request->category_id;
            $save_data->name = $request->name;
            $save_data->description = $request->description;
            $save_data->is_active = 1;
            $save_data->price = $request->price;
            $save_data->signup_fee = $request->signup_fee;
            $save_data->currency = $request->currency;
            $save_data->trial_period = $request->trial_period;
            $save_data->trial_interval = $request->trial_interval;
            $save_data->invoice_period = $request->invoice_period;
            $save_data->invoice_interval = $request->invoice_interval;
            $save_data->grace_period = $request->grace_period;
            $save_data->grace_interval = $request->grace_interval;
            $save_data->prorate_day = $request->prorate_day;
            $save_data->prorate_period = $request->prorate_period;
            $save_data->is_pop_up = $request->is_pop_up;
            $save_data->prorate_extend_due = $request->prorate_extend_due;
            $save_data->active_subscribers_limit = $request->active_subscribers_limit;
            $save_data->sort_order = $request->sort_order;
            if ($request->hasFile('image')) {
                $file_name =   uploadFiles::uploadFileData($request->file('image'), 'plans');
                $save_data->image = $file_name;
            }
            $save_data->save();
            return response()->json(['success' => $msg]);
        }
    }


    function create_plan_features()
    {
        $data['plan_features'] = planFeatures::where(['deleted_at' => null])->get();
        return view('user.create_plan_features', $data);
    }

    function manage_plan_features($id = '')
    {
        $data['plans'] = plan::where(['deleted_at' => null])->get();
        if (!empty($id)) {
            $manage_plan_features =  planFeatures::find($id);
            $data['plan_id'] = $manage_plan_features->plan_id;
            $data['slug'] = $manage_plan_features->slug;
            $data['name'] = $manage_plan_features->name;
            $data['description'] = $manage_plan_features->description;
            $data['value'] = $manage_plan_features->value;
            $data['resettable_period'] = $manage_plan_features->resettable_period;
            $data['resettable_interval'] = $manage_plan_features->resettable_interval;
            $data['sort_order'] = $manage_plan_features->sort_order;
            $data['id'] = $manage_plan_features->id;
        } else {
            $data['plan_id'] = '';
            $data['slug'] =  '';
            $data['name'] =  '';
            $data['description'] =  '';
            $data['value'] =  '';
            $data['resettable_period'] =  '';
            $data['resettable_interval'] = '';
            $data['sort_order'] =  '';
            $data['id'] =  '';
        }
        return view('user.manage_plan_features', $data);
    }



    function manage_plan_features_process(Request $request)
    {


        $id = $request->id;
        $validator = validator::make($request->all(), [
            'slug' => "required|regex:/(^[A-Za-z0-9 ]+$)+/|unique:plans,slug,$id",
            'plan_id' => 'required',
            'name' => 'required',
            'image' => uploadFiles::image(512),


        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            if (!empty($id)) {
                $save_data = planFeatures::find($id);
                $msg = 'data updated';
            } else {
                $save_data = new planFeatures();
                $msg = 'data Saved';
            }
            $save_data->plan_id  = $request->plan_id;
            $save_data->slug   = $request->slug;
            $save_data->name  = $request->name;
            $save_data->description  = $request->description;
            $save_data->value  = $request->value;
            $save_data->resettable_period  = $request->resettable_period;
            $save_data->resettable_interval  = $request->resettable_interval;
            $save_data->sort_order  = $request->sort_order;

            if ($request->hasFile('image')) {
                $file_name =   uploadFiles::uploadFileData($request->file('image'), 'plans');
                $save_data->image = $file_name;
            }


            $save_data->save();
            return response()->json(['success' => $msg]);
        }
    }



    function create_plan_features_delete(Request $request)
    {
        $id = $request->post('id');
        $delete_data = planFeatures::find($id);
        $delete_data->delete();
        return response()->json(['success' => 'deleted', 'msg' => 'plan Features data deleted']);
    }

    function create_plan_delete(Request $request)
    {
        $id = $request->post('id');
        $delete_data = plan::find($id);
        $delete_data->delete();
        return response()->json(['success' => 'deleted', 'msg' => 'plan Features data deleted']);
    }



    function plan_subscription($slug)
    {
        if (empty($slug)) {
            return Redirect::back();
        } else {
            $slug_name = str_replace('-', ' ', $slug);
            $data['get_plan_details'] = plan::where(['slug' => $slug_name])->get();
            if (!empty($data['get_plan_details'][0])) {
                $data['plan_name'] = $data['get_plan_details'][0]->name;
                $data['slug'] = $data['get_plan_details'][0]->slug;
                $data['price'] = $data['get_plan_details'][0]->price;
                $plan_history = purchaseHistory::where(['user_id' => auth()->user()->id])
                    ->where(['payment_status' => 'pending'])
                    ->get();

                if (empty($plan_history[0])) {
                    $data_save =  new purchaseHistory();
                    $data_save->plan_slug = $data['slug'];
                    $data_save->user_id = auth()->user()->id;
                    $data_save->payment_status = 'pending';
                    $data_save->save();

                }

                return view('razorpay.index', $data);
            } else {
                return Redirect::back();
            }
        }
    }



    function payment_invoice($order_id)
    {

        if (!empty($order_id)) {
            if (Auth::check()) {
                $get_order_details = purchaseHistory::where(['order_id' => $order_id])->get();
                if (!empty($get_order_details[0])) {
                    $data['plan'] =   $get_order_details[0]->plan_slug;
                    $data['payment_id'] =   $get_order_details[0]->payment_id;
                    $data['amount'] =   $get_order_details[0]->amount;
                    $data['currency'] =   $get_order_details[0]->currency;
                    $data['status'] =   $get_order_details[0]->status;
                    $data['order_id'] =   $get_order_details[0]->order_id;
                    $data['method'] =   $get_order_details[0]->method;
                    $data['description'] =   $get_order_details[0]->description;
                    $data['updated_at'] =   $get_order_details[0]->updated_at;


                    return view('user.payment_status',$data);
                } else {
                    return   redirect('404');
                }
            }
        }
    }


    function active_service($order_id,$token)
    {

        if (!empty($order_id) && !empty($token)) {
            if (Auth::check()) {
                    $get_order_details = purchaseHistory::where(['order_id' => $order_id])
                    ->where(['act_token'=>$token])
                    ->get();

                if (!empty($get_order_details[0])) {
                            $plan_slug =  $get_order_details[0]->plan_slug;
                            $get_plan = plan::where(['slug' => $plan_slug])->get();
                            $plan_id = $get_plan[0]->id;
                            $prorate_period = $get_plan[0]->prorate_period;
                            $save_plan_data = new planSubscription();
                            $save_plan_data->subscriber_type = 'user';
                            $save_plan_data->subscriber_id =  auth()->user()->id;
                            $save_plan_data->plan_id = $plan_id;
                            $save_plan_data->description = 'description';
                            $save_plan_data->trial_ends_at = '';
                            $save_plan_data->starts_at = Carbon::now()->toDateTimeString();
                            $save_plan_data->ends_at = Carbon::now()->subDays(-$prorate_period);
                            $save_plan_data->timezone = '';
                            $save_plan_data->status = 'active';
                            if($save_plan_data->save()){
                                $get_order_details = purchaseHistory::where(['order_id' => $order_id])
                                ->where(['act_token'=>$token])
                                ->update([
                                    'act_token'=>''
                                ]);


                                return redirect('invoice-history');
                            }



                            return view('user.active_service');
                } else {
                    return   redirect('505');
                }
            }
        }
    }




function invoice_history(){

$data['invoice_history'] = planSubscription::Join('purchase_histories','purchase_histories.user_id','=','plan_subscriptions.subscriber_id')
->where(['plan_subscriptions.subscriber_id'=>auth()->user()->id])
->orderBy('plan_subscriptions.starts_at','DESC')
->get();

return view('user.invoice_history',$data);

}



function plan_details($order_id){
    $data['plan_details'] = planSubscription::Join('purchase_histories','purchase_histories.user_id','=','plan_subscriptions.subscriber_id')
    ->select(['purchase_histories.*',
    'plan_subscriptions.id as plan_subscriptions_id','plan_subscriptions.subscriber_type',
    'plan_subscriptions.subscriber_type',
    'plan_subscriptions.subscriber_id',
    'plan_subscriptions.plan_id',
    'plan_subscriptions.description',
    'plan_subscriptions.trial_ends_at',
    'plan_subscriptions.starts_at',
    'plan_subscriptions.ends_at',
    'plan_subscriptions.cancels_at',
    'plan_subscriptions.canceled_at',
    'plan_subscriptions.timezone',
    'plan_subscriptions.created_at',
    'plan_subscriptions.status as plan_subscriptions_status',
    'plan_subscriptions.updated_at',

    ])
->where(['plan_subscriptions.subscriber_id'=>auth()->user()->id])
->orderBy('plan_subscriptions.starts_at','DESC')
->get();

 $data['subscriber_type'] = $data['plan_details'][0]->subscriber_type;
 $data['subscriber_id'] = $data['plan_details'][0]->subscriber_id;
 $data['plan_id'] = $data['plan_details'][0]->plan_id;
 $data['description'] = $data['plan_details'][0]->description;
 $data['trial_ends_at'] = $data['plan_details'][0]->trial_ends_at;
 $data['starts_at'] = $data['plan_details'][0]->starts_at;
 $data['ends_at'] = $data['plan_details'][0]->ends_at;
 $data['cancels_at'] = $data['plan_details'][0]->cancels_at;
 $data['canceled_at'] = $data['plan_details'][0]->canceled_at;
 $data['timezone'] = $data['plan_details'][0]->timezone;
 $data['created_at'] = $data['plan_details'][0]->created_at;
 $data['plan_subscriptions_status'] = $data['plan_details'][0]->plan_subscriptions_status;
 $data['updated_at'] = $data['plan_details'][0]->updated_at;
 $data['plan_slug'] = $data['plan_details'][0]->plan_slug;
 $data['user_id'] = $data['plan_details'][0]->user_id;
 $data['payment_id'] = $data['plan_details'][0]->payment_id;
 $data['entity'] = $data['plan_details'][0]->entity;
 $data['amount'] = $data['plan_details'][0]->amount;
 $data['currency'] = $data['plan_details'][0]->currency;
 $data['status'] = $data['plan_details'][0]->status;
 $data['order_id'] = $data['plan_details'][0]->order_id;
 $data['invoice_id'] = $data['plan_details'][0]->invoice_id;
 $data['international'] = $data['plan_details'][0]->international;
 $data['method'] = $data['plan_details'][0]->method;
 $data['amount_refunded'] = $data['plan_details'][0]->amount_refunded;
 $data['refund_status'] = $data['plan_details'][0]->refund_status;
 $data['description'] = $data['plan_details'][0]->description;
 $data['payment_status'] = $data['plan_details'][0]->payment_status;



return view('user.plan_details',$data);
}


}
