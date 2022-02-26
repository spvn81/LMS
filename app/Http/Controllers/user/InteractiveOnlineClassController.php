<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InteractiveOnlineClass;
use App\Models\categories;
use Illuminate\Support\Facades\Validator;
use App\Helpers\uploadFiles;
use Illuminate\Support\Facades\Redirect;
use  Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\URL;


class InteractiveOnlineClassController extends Controller
{

    function create_class()
    {
        $data['online_class'] = InteractiveOnlineClass::all();
        return view('user.create_class', $data);
    }


    function manage_class($id = '')
    {
        $data['category'] = categories::where(['status' => 1])
        ->where(['category_type'=>'online_meeting'])
        ->get();
            $data['get_host'] = User::where('user_status',1)
                  ->where(function($q){
                $q->where('user_type','super_admin')
                ->orWhere('user_type','admin');
            })
            ->get();






        if (!empty($id)) {
            $data['manage_class'] =  InteractiveOnlineClass::find($id);
            $data['Category_id'] =          $data['manage_class']->Category_id;
            $data['date'] =          $data['manage_class']->date;
            $data['from'] =          $data['manage_class']->from;
            $data['to']   =            $data['manage_class']->to;
            $data['user_id'] =       $data['manage_class']->user_id;
            $data['subject'] =       $data['manage_class']->subject;
            $data['meeting_url'] =   $data['manage_class']->meeting_url;
            $data['session_name'] =   $data['manage_class']->session_name;
            $data['session_description'] =   $data['manage_class']->session_description;
            $data['host_by'] =   $data['manage_class']->host_by;
            $data['additional_teachers'] =   $data['manage_class']->additional_teachers;
            $data['alert'] =   $data['manage_class']->alert;
            $data['class_thumbnail'] =   $data['manage_class']->class_thumbnail;
            $data['status'] =   $data['manage_class']->status;
            $data['id'] =   $data['manage_class']->id;
        } else {
            $data['Category_id'] =  '';
            $data['date'] =  '';
            $data['from'] =  '';
            $data['to']   =   '';
            $data['user_id'] =  '';
            $data['subject'] =     '';
            $data['meeting_url'] =   '';
            $data['session_name'] =  '';
            $data['session_description'] = '';
            $data['host_by'] =  '';
            $data['additional_teachers'] =   '';
            $data['alert'] =   '';
            $data['class_thumbnail'] =   '';
            $data['status'] =   '';
            $data['id'] =   '';
        }
        return view('user.manage_class', $data);
    }



    function manage_class_process(Request $request)
    {
        $Category_id = $request->Category_id;
        $date = $request->date;
        $from = $request->from;
        $to = $request->to;
        $user_id = $request->user_id;
        $subject = $request->subject;
        $meeting_url = $request->meeting_url;
        $session_name = $request->session_name;
        $session_description = $request->session_description;
        $host_by = $request->host_by;
        $additional_teachers = $request->additional_teachers;
        $alert = $request->alert;
        $id = $request->id;

        if(!empty($id)){
            $image_validator = uploadFiles::image(1000);
        }else{
            $image_validator = uploadFiles::image(1000,'required');
            }

        $validator = validator::make($request->all(), [
            'Category_id' => 'required',
            'date' => 'required',
            'from' => 'required',
            'to' => 'required',
            'user_id' => 'required',
            'subject' => 'required',
            'meeting_url' => 'required',
            'session_name' => 'required',
            'session_description' => 'required',
            'host_by' => 'required',
            'class_thumbnail' => $image_validator,
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            if (!empty($id)) {
                $data_save  = InteractiveOnlineClass::find($id);
            } else {
                $data_save  = new InteractiveOnlineClass();
            }
            $data_save->Category_id = $Category_id;
            $data_save->date = $date;
            $data_save->from = $from;
            $data_save->to = $to;
            $data_save->user_id = $user_id;
            $data_save->subject = $subject;
            $data_save->meeting_url = $meeting_url;
            $data_save->session_name = $session_name;
            $data_save->session_description = $session_description;
            $data_save->host_by = $host_by;
            $data_save->additional_teachers = $additional_teachers;
            $data_save->status = 1;
            if ($request->hasFile('class_thumbnail')) {
                $file_name =   uploadFiles::uploadFileData($request->file('class_thumbnail'));
                $data_save->class_thumbnail = $file_name;

            }
            $data_save->save();
            return response()->json(['success'=>'saved']);

        }
    }

function manage_class_status($id,$changed_status){
    $status_data = InteractiveOnlineClass::find($id);
    $status_data->status = $changed_status;
    $status_data->save();
    Session::flash('message', "class Status updated");
    return Redirect::back();
}



function class_delete(Request $request){
    $id = $request->post('id');
    $delete_data = InteractiveOnlineClass::find($id);
    $path = 'public/media/'.$delete_data->class_thumbnail;
    Storage::delete($path);
    $delete_data->delete();
    return response()->json(['success'=>'deleted','msg'=>'class data deleted']);
}


}
