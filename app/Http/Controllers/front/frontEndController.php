<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\InteractiveOnlineClass;
use App\Models\package;
use App\Models\plan;
use App\Models\planSubscription;
use phpDocumentor\Reflection\Types\Void_;
use Spatie\MediaLibrary\MediaCollections\Models\Media;



class frontEndController extends Controller
{
   function index(){

       $data['plans'] = plan::join('categories','plans.category_id','=','categories.id')
       ->select(['plans.*','categories.id as cat_id','categories.user_id'
       ,'categories.categories'
       ,'categories.categories_slug'
       ,'categories.parent_cat_id'
       ,'categories.category_type'
       ,'categories.link'
       ,'categories.status'
       ])
       -> where(['categories.status'=>1])
      -> where(['plans.deleted_at'=>null])
    ->orderBy('plans.sort_order','desc')
    ->get();
    //check user user has in subscribe or not
    if (Auth::check()) {
        $data['plan_subscription'] = planSubscription::where(['subscriber_id'=>Auth::user()->id])->get();
    }else{
        $data['plan_subscription'] = '';
    }

    return view('frontend.home',$data);
   }


   function dashboard(){
    if (Auth::check()) {
        return view('user.dashboard');
    }else{
      return  redirect('/');
    }
   }



   function register(){
       return view('frontend.home');
   }


   function package_info(){
       return view('frontend.package_info');
   }

   function all_course_category(){

    return view('frontend.all_course_category');
   }


}
