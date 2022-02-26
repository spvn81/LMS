<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mediaUploader;
use App\Helpers\uploadFiles;
use App\Models\categories;
use App\Models\tempFiles;
use App\Models\videoCategory;
use Illuminate\Support\Str;
use App\Models\videoLibrary;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\InteractiveOnlineClass;
use App\Models\plan;
use App\Models\planSubscription;
use App\Models\premiumVideoCategories;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;





class mediaController extends Controller
{
    function upload_media($id = '')
    {
        $data['video_category'] = videoCategory::where(['vod_category_status' => 1])
            ->where(['user_id' => auth::user()->id])->get();
        return view('user.upload_media', $data);
    }


    function upload_files(Request $request)
    {

        $id = $request->id;
        if (!empty($id)) {
            $video_validator =  uploadFiles::video(1000);
        } else {
            $video_validator =  uploadFiles::video(1000, 'required');
        }
        $image_validate =  uploadFiles::image(1000);


        $validator = validator::make($request->all(), [
            'title' => 'required',
            'file' => $video_validator,
            'video_category_id' => 'required',
            'thumbnail' => $image_validate,

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {



            $data = new videoLibrary();
            $data->user_id  = $request->user_id;
            $data->title  = $request->title;
            $data->video_category_id   = $request->video_category_id;
            $data->description      = $request->description;
            $data->is_featured      = $request->is_featured;
            $data->is_premium      = $request->is_premium;
            $data->cast      = $request->cast;


            if ($request->hasFile('file')) {

                $upload = uploadFiles::uploadFileData($request->file('file'), 'videos');
                $data->file_name = $upload;
            }
            if ($request->hasFile('thumbnail')) {
                $upload_thumbnail = uploadFiles::uploadFileData($request->file('thumbnail'), 'thumbnails');
                $data->thumbnail = $upload_thumbnail;
            }



            if ($data->save()) {
                $last_id = $data->id;
                $find_data = videoLibrary::find($last_id);
                return response()->json(['success' => $find_data, 'status' => 'ok']);
            } else {
                return response()->json(['status' => 'err']);
            }
        }
    }



    function videos()
    {
        $mutable = Carbon::now();
        $today_date =    $mutable->toDateString();
        $now_time = $mutable->toTimeString();

        $data['categories'] = videoCategory::where(['vod_category_status' => 1])->get();

        $data['Interactive_online_class'] =
            InteractiveOnlineClass::select(
                'interactive_online_classes.*',
                'categories.id as category_id',
                'categories.user_id',
                'categories.categories',
                'categories.categories_slug',
                'categories.parent_cat_id',
                'categories.category_type',
                'categories.category_image',
                'categories.status'
            )
            ->join('categories', 'categories.id', '=', 'interactive_online_classes.category_id')
            ->where(['categories.status' => 1])
            ->where(['interactive_online_classes.date' => $today_date])
            ->where('to', '>=', $now_time)
            ->get();




        $data['video_libraries_is_featured'] =
            videoLibrary::select(
                'video_libraries.*',
                'video_categories.id as video_category_id',
                'video_categories.user_id',
                'video_categories.vod_category_name',
                'video_categories.vod_category_slug',
                'video_categories.image',
                'video_categories.vod_category_status'
            )
            ->join('video_categories', 'video_categories.id', '=', 'video_libraries.video_category_id')
            ->where(['video_libraries.is_featured' => 1])
            ->where(['video_libraries.is_premium' => null])
            ->where(['video_categories.vod_category_status' => 1])
            ->get();


        //get video categories by premium  plan plan
        $data['video_libraries_is_premium'] =
            videoLibrary::select(
                'video_libraries.*',
                'video_categories.id as video_category_id',
                'video_categories.user_id',
                'video_categories.vod_category_name',
                'video_categories.vod_category_slug',
                'video_categories.image',
                'video_categories.vod_category_status'
            )
            ->join('video_categories', 'video_categories.id', '=', 'video_libraries.video_category_id')

            ->where(['video_categories.is_premium' => 1])
            ->where(['video_categories.vod_category_status' => 1])
            ->get();

        $data['premium_video_category'] = premiumVideoCategories::all();
        $data['plan'] = plan::all();
        $data['plan_subscriptions'] = planSubscription::where(['subscriber_id' => Auth::user()->id])->get();
        $data['premium_category_v'] = videoCategory::where(['is_premium' => 1])->get();

            $data['categories_premium'] =
            premiumVideoCategories::join('video_categories', 'video_categories.id', '=', 'premium_video_categories.video_cat_id')
            ->join('plan_subscriptions', 'premium_video_categories.package_id', '=', 'plan_subscriptions.plan_id')
            ->where(['subscriber_id' => Auth::user()->id])
            ->where('ends_at', '>=', Carbon::today())
            ->where(['canceled_at' => null])
            ->get();


        //get purchase of data user
        $data['premium_user_data'] = planSubscription::where(['subscriber_id' => Auth::user()->id])
            ->where('ends_at', '>=', Carbon::today())
            ->where(['canceled_at' => null])
            ->get();






        return view('user.video.index', $data);
    }



    function video_category()
    {
        $user_id = Auth::user()->id;
        $data['video_category'] = videoCategory::where(['user_id' => $user_id])->get();
        return view('user.video.video_category', $data);
    }




    function manage_video_category($id = '')
    {


        if (!empty($id)) {
            $data['cat'] = videoCategory::find($id);
            $data['user_id'] = $data['cat']->user_id;
            $data['vod_category_name'] = $data['cat']->vod_category_name;
            $data['vod_category_slug'] = $data['cat']->vod_category_slug;
            $data['vod_category_status'] = $data['cat']->vod_category_status;
            $data['avatar'] = json_decode($data['cat']->getMediaResource('avatars'));
            $data['id'] = $data['cat']->id;
            $data['image'] = $data['cat']->image;
            $data['is_premium'] = $data['cat']->is_premium;
        } else {

            $data['vod_category_name'] =  "";
            $data['vod_category_slug'] =  "";
            $data['vod_category_status'] =  "";
            $data['id'] = '';
            $data['avatar'] = '';
            $data['image'] = '';
            $data['is_premium'] = '';
        }
        return view('user.video.manage_video_category', $data);
    }




    function manage_video_category_process(Request $request)
    {
        $vod_category_name = $request->post('vod_category_name');
        $vod_category_slug = $request->post('vod_category_slug');
        $is_premium = $request->post('is_premium');
        $id = $request->post('id');
        $validator = validator::make($request->all(), [
            'vod_category_name' => 'required',
            'vod_category_slug' => "required|regex:/(^[A-Za-z0-9 ]+$)+/|unique:video_categories,vod_category_slug,$id",

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            if (!empty($id)) {
                $data_save = videoCategory::find($id);
            } else {
                $data_save = new videoCategory();
            }
            $data_save->vod_category_name = $vod_category_name;
            $data_save->vod_category_slug = $vod_category_slug;
            $data_save->is_premium = $is_premium;
            $data_save->vod_category_status = 1;
            $data_save->user_id = Auth::user()->id;
            $data_save->save();
            $data_save->addAllMediaFromTokens();
            return response()->json(['success' => 'saved']);
        }
    }



    function video_categories_status($id, $changed_status)
    {
        $status_data = videoCategory::find($id);
        $status_data->vod_category_status = $changed_status;
        $status_data->save();
        Session::flash('message', "video Category Status updated");
        return Redirect::back();
    }

    function video_categories_delete(Request $request)
    {
        $id = $request->post('id');
        $delete_data = videoCategory::find($id);
        $delete_data->delete();
        return response()->json(['success' => 'deleted', 'msg' => 'video category data deleted']);
    }


    function vod_cat_pic_active($id, $cat_id, $changed_status)
    {
        $save_data = videoCategory::find($cat_id);
        if ($changed_status == 0) {
            $save_data->image = '';
        } else {
            $status_data = json_decode(Media::find($id));
            $file_name = $id . '/' . $status_data->file_name;
            $save_data->image = $file_name;
        }

        $save_data->save();
        Session::flash('message', "picture updated");
        return Redirect::back();
    }




    function videos_play_by_id($slug, $id)
    {
        $slug_get = str_replace('-', ' ', $slug);

        $video_category_data = videoCategory::where(['vod_category_slug'=>$slug_get])->get();


            if ($video_category_data[0]->is_premium==1) {


                $data['premium_category_v'] = videoCategory::where(['is_premium' => 1])->get();
                    $data['videos_data'] =
                    premiumVideoCategories::join('video_categories', 'video_categories.id', '=', 'premium_video_categories.video_cat_id')
                    ->join('plan_subscriptions', 'premium_video_categories.package_id', '=', 'plan_subscriptions.plan_id')
                    ->join('video_libraries','video_libraries.video_category_id','=','video_categories.id')
                    ->where(['subscriber_id' => Auth::user()->id])
                    ->where('ends_at', '>=', Carbon::today())
                    ->where(['canceled_at' => null])
                    ->where(['video_libraries.id' => $id])
                    ->get();



                    $data['videos_category_data'] =
                    videoLibrary::select(
                        'video_libraries.*',
                        'video_categories.id as video_category_id',
                        'video_categories.user_id',
                        'video_categories.vod_category_name',
                        'video_categories.vod_category_slug',
                        'video_categories.image',
                        'video_categories.vod_category_status'
                    )
                    ->join('video_categories', 'video_categories.id', '=', 'video_libraries.video_category_id')
                    ->where(['video_categories.vod_category_slug' => $slug_get])
                    ->where(['video_categories.vod_category_status' => 1])
                    ->get();




            } else {
                $data['videos_data'] =
               videoLibrary::select(
                'video_libraries.*',
                'video_categories.id as video_category_id',
                'video_categories.user_id',
                'video_categories.vod_category_name',
                'video_categories.vod_category_slug',
                'video_categories.image',
                'video_categories.vod_category_status'
            )
            ->join('video_categories', 'video_categories.id', '=', 'video_libraries.video_category_id')

            ->where(['video_libraries.id' => $id])
            ->where(['video_categories.vod_category_slug' => $slug_get])
            ->where(['video_categories.vod_category_status' => 1])
           ->get();

            $data['videos_category_data'] =
            videoLibrary::select(
                'video_libraries.*',
                'video_categories.id as video_category_id',
                'video_categories.user_id',
                'video_categories.vod_category_name',
                'video_categories.vod_category_slug',
                'video_categories.image',
                'video_categories.vod_category_status'
            )
            ->join('video_categories', 'video_categories.id', '=', 'video_libraries.video_category_id')
            ->where(['video_categories.vod_category_slug' => $slug_get])
            ->where(['video_categories.vod_category_status' => 1])
            ->get();
            }







            if (!empty($data['videos_data'])) {
                $post = videoLibrary::find($id);
                $data['count'] =   views($post)->record();
                $data['views_count'] =  views($post)->count();

                $url =   URL::previous();
                $user = auth::user()->id;
                activity()->log($url);


            } else {
                return redirect('videos');
            }


            return view('user.video.video_player', $data);


    }


    function  video_category_page()
    {
        $data['get_all_categories'] = videoCategory::where(['vod_category_status' => 1])->latest()->paginate(20);
        return view('user.video.video_categories', $data);
    }



    function videos_by_category($slug)
    {
        if (!empty($slug)) {
            $cat_slug = str_replace('-', ' ', $slug);
            $cat_data = videoCategory::where(['vod_category_slug' => $cat_slug])->get();
            if (!empty($cat_data[0])) {

                $data['videos_category_data'] =
                    videoLibrary::select(
                        'video_libraries.*',
                        'video_categories.id as video_category_id',
                        'video_categories.user_id',
                        'video_categories.vod_category_name',
                        'video_categories.vod_category_slug',
                        'video_categories.image',
                        'video_categories.vod_category_status'
                    )
                    ->join('video_categories', 'video_categories.id', '=', 'video_libraries.video_category_id')
                    ->where(['video_categories.vod_category_slug' => $cat_slug])
                    ->where(['video_categories.vod_category_status' => 1])
                    ->get();



                return view('user.video.videos', $data);
            } else {
                return redirect('videos/index');
            }
        } else {
            return redirect('videos/index');
        }
    }

    function online_meeting_categories()
    {

        $data['get_all_categories'] = categories::where(['status' => 1])->latest()->paginate(20);


        return view('user.video.online_meeting_categories', $data);
    }



    function live_meeting($slug)
    {

        if (!empty($slug)) {

            $cat_slug = str_replace('-', ' ', $slug);

            $cat_data = categories::where(['categories_slug' => $cat_slug])->get();

            if (!empty($cat_data[0])) {



                $mutable = Carbon::now();
                $today_date =    $mutable->toDateString();
                $now_time = $mutable->toTimeString();

                $data['Interactive_online_class'] =
                    InteractiveOnlineClass::select(
                        'interactive_online_classes.*',
                        'categories.id as category_id',
                        'categories.user_id',
                        'categories.categories',
                        'categories.categories_slug',
                        'categories.parent_cat_id',
                        'categories.category_type',
                        'categories.image',
                        'categories.status'
                    )
                    ->join('categories', 'categories.id', '=', 'interactive_online_classes.category_id')
                    ->where(['categories.status' => 1])
                    ->where(['categories.categories_slug' => $cat_slug])
                    ->where(['interactive_online_classes.date' => $today_date])
                    ->where('to', '>=', $now_time)

                    ->get();


                $url =   URL::previous();
                $user = auth::user()->id;
                activity()->log($url);


                return view('user.video.live_meeting', $data);
            } else {
                return redirect('videos/index');
            }
        } else {
            return redirect('videos/index');
        }
    }

    function history_page()
    {
        $data['history'] = Activity::all();

        return view('user.video.history_page', $data);
    }

    function config_video_premium($id)
    {
        $data['video_category'] = videoCategory::find($id);
        $data['plans'] = plan::where(['deleted_at' => null])->get();
        $data['premium_video_categories'] = premiumVideoCategories::where(['video_cat_id' => $id])->get();

        return view('user.config_video_premium', $data);
    }



    function config_video_category_premium(Request $request)
    {
        $package_id = $request->package_id;
        $video_cat_id = $request->video_cat_id;

        $validator = validator::make($request->all(), [
            'video_cat_id' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            $delete_old = premiumVideoCategories::where(['video_cat_id' => $video_cat_id])->delete();
            if (!empty($package_id)) {
                $count = count($package_id);
                for ($i = 0; $i < $count; $i++) {
                    $save = new premiumVideoCategories();
                    $save->package_id = $package_id[$i];
                    $save->video_cat_id = $video_cat_id;
                    $save->save();
                }
                return response()->json(['success' => 'saved']);
            }
        }
    }


    function video_delete(Request $request)
    {

        $id = $request->post('id');
        $delete_data = videoLibrary::find($id);
        $path = 'public/media/' . $delete_data->avatar;
        Storage::delete($path);
        $delete_data->delete();
        return response()->json(['success' => 'deleted']);
    }
}
