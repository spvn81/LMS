<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\categoryType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use  Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;




class menuController extends Controller
{
    function menu()
    {

        $data['menu'] = menu::all();
        return view('user.menu', $data);
    }



    function manage_menu($id = '')
    {
        $data['menu'] = menu::all();
        $data['menu_type_data'] = categoryType::all();

        if (!empty($id)) {
            $data['menu_data'] = menu::find($id);
            $data['menu_name'] = $data['menu_data']->menu_name;
            $data['menu_slug'] = $data['menu_data']->menu_slug;
            $data['id'] = $data['menu_data']->id;
            $data['menu_parent_id'] = $data['menu_data']->menu_parent_id;
            $data['link'] = $data['menu_data']->link;
            $data['menu_type'] = $data['menu_data']->menu_type;
        } else {

            $data['menu_name'] = '';
            $data['menu_slug'] = '';
            $data['id'] = '';
            $data['menu_parent_id'] = '';
            $data['link'] = '';
            $data['menu_type'] = '';
        }
        return view('user.manage_menu', $data);
    }





    function manage_menu_process(Request $request)
    {
        $menu_name = $request->post('menu_name');
        $menu_slug = $request->post('menu_slug');
        $menu_parent_id = $request->post('menu_parent_id');
        $link = $request->post('link');
        $menu_type = $request->post('menu_type');
        $id = $request->post('id');
        $validator = validator::make($request->all(), [
            'menu_name' => 'required',
            'menu_slug' => "required|regex:/(^[A-Za-z0-9 ]+$)+/|unique:menus,menu_slug,$id",
            'menu_type' => 'required',


        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            if (!empty($id)) {
                $data_save = menu::find($id);
            } else {
                $data_save = new menu();
            }
            $data_save->menu_name = $menu_name;
            $data_save->menu_slug = $menu_slug;
            $data_save->menu_parent_id     = $menu_parent_id;
            $data_save->link = $link;
            $data_save->user_id  = Auth::user()->id;
            $data_save->menu_type = $menu_type;
            $data_save->save();
            return response()->json(['success' => 'saved']);
        }
    }




    function menu_delete(Request $request){
        $id = $request->post('id');
        $delete_data = menu::find($id);
        $delete_data->delete();
        return response()->json(['success'=>'deleted','msg'=>'Menu data deleted']);
        }


}
