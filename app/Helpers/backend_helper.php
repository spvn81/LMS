<?php

namespace App\Helpers;

use App\Models\appInfo;
use App\Models\categories;
use Illuminate\Support\Facades\Session;
use App\Models\menu;




class getApp
{
    public static function showAppInfo()
    {
        $data =  appInfo::all();
        foreach ($data as $app_data) {
            return $app_data;
        }
    }
}


class CustomBackEnd
{
    public static function  get_delete($id)
    {
        return  $html = '<i  type="button" class="far fa-trash-alt text-danger" onclick="delete_data(' . $id . ')"></i>';
    }

    public static function get_status($status, $url)
    {
        if ($status == 1) {
            return  $html = '<a href="' . $url . '/' . "0" . '">
            <i class="fas fa-check-circle text-success"></i></a>';
        } else {
            return  $html = '<a href="' . $url . '/' . "1" . '">
            <i class="far fa-times-circle text-danger"></i></a>';
        }
    }

    public static function getEdit($url)
    {
        return  $html = '<a href="'.$url . '"><i class="fas fa-edit"></i></a>';
    }



    public static function getCategories()
    {
        return categories::where(['status' => 1])->get();
    }



    public  static function  getTopNavCat()
    {
        $result = menu::where(['menu_type'=>'main_menu'])->get();
        foreach ($result as $row) {
            $arr[$row->id]['categories'] = $row->menu_name;
            $arr[$row->id]['parent_cat_id'] = $row->menu_parent_id;
            $arr[$row->id]['url'] = $row->menu_slug;
            $arr[$row->id]['link'] = $row->link;
        }
        $str = CustomBackEnd::buildTreeView($arr, 0);
        return $str;
    }



    public static function  buildTreeView($arr, $parent, $level = 0, $preLevel = -1)
    {
        $html = '';

        global $html;
        $i = 1;
        foreach ($arr as $id => $data) {

            if($data['parent_cat_id']==null && $data['link']==null ){
                $nav_item = 'nav-item dropdown';
                $a_nav_link = 'nav-link';
                $link = '#';

            }elseif($data['parent_cat_id']==null && $data['link'] !=null){
                $nav_item = 'nav-item';
                $a_nav_link = 'nav-link';
                $link = $data['link'];

            }elseif($data['parent_cat_id']!=null && $data['link'] != null){
                $nav_item = 'nav-item';
                $a_nav_link = 'dropdown-item';
                $link = $data['link'];

            }
            if ($parent == $data['parent_cat_id']) {
                if ($level > $preLevel) {

                    if ($html == '') {
                        $html .= ' <ul class="navbar-nav ml-auto">';
                    } else {
                        $html .= '<ul class="dropdown-menu">';
                    }
                }
                if ($level == $preLevel) {
                    $html .= '</li>';
                }

                $html .= '<li class="'.$nav_item.'">
                <a  class="'.$a_nav_link.'   text-uppercase"   href="'.$link.'"  >' . $data['categories'] . '</a>';
                if ($level > $preLevel) {
                    $preLevel = $level;
                }
                $level++;
                CustomBackEnd::buildTreeView($arr, $id, $level, $preLevel);
                $level--;
            }
        }
        if ($level == $preLevel) {
            $html .= '</li></ul>';
        }
        return $html;
    }




    public static function active_image($status, $url)
    {
        if (!empty($status)) {
            return  $html = '<a href="' . $url . '/' . "0" . '">
            <i class="fas fa-check-circle text-success"></i></a>';
        } else {
            return  $html = '<a href="' . $url . '/' . "1" . '">
            <i class="far fa-times-circle text-danger"></i></a>';
        }
    }
}



class uploadFiles
{

    public static function image($max_file_size = '', $req = '')
    {
        if (empty($max_file_size)) {
            return $file_formats = 'mimes: tif,tiff,jpg,jpeg,gif,bmp,png,eps|' . $req . '|max:10000';
        } else {
            return $file_formats = 'mimes: tif,tiff,jpg,jpeg,gif,bmp,png,eps|' . $req . '|max:' . $max_file_size;
        }
    }

    public static function video($max_file_size, $req = '')
    {
        if (empty($max_file_size)) {
            return $file_formats = 'mimes:  webm,mp4,ogv,mov,3gp,avi,wmv|' . $req . '|max:10000';
        } else {
            return $file_formats = 'mimes: webm,mp4,ogv,mov,3gp,avi,wmv|' . $req . '|max:' . $max_file_size * 1024;
        }
    }


    public static function uploadFileData($name, $file_path = '')
    {
        $file = $name;
        if (empty($file_path)) {
            $path = $file->store('/public/media/upload');
            $file_name = pathinfo($path)['basename'];
            return $data_sore = 'upload/' . $file_name;
        } else {
            $path = $file->store('/public/media/' . $file_path);
            $file_name = pathinfo($path)['basename'];
            return $data_sore = $file_path . '/' . $file_name;
        }
    }
}

class regularModules
{
    public static function defaultNotification($color = '')
    {
        $html = '';
        if (Session::has('message')) {
            $html .=  '<div class="alert alert-' . $color . ' alert-dismissible fade show text-capitalize" role="alert">
            <strong>';
            $html .=  Session::get('message');
            $html .= '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            return  $html;
        }
    }

    public static function convertSlugIntoUrl($str)
    {
        $slug = urlencode($str);
        return str_replace('+', '-', $slug);
    }
}
