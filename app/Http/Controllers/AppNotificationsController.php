<?php

namespace App\Http\Controllers;

use App\Models\appNotifications;
use Illuminate\Http\Request;

class AppNotificationsController extends Controller
{
function notifications(){
    return view('user.notifications');
}


}
