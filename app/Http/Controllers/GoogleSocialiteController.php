<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use  Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Mail\mailSupport;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\otp;
use App\Rules\PhoneNumber;
use App\Models\appInfo;
use App\Helpers\getApp;
use App\Models\userCreateData;
use App\Helpers\uploadFiles;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Carbon\Carbon;



class GoogleSocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
              $findUser_email = User::where('email', $user->email)->first();

            if(!empty($findUser_email)){
                $update = user::where(['email'=>$user->email])
                ->update(['social_id'=>$user->id]);
            }

            $findUser = User::where('social_id', $user->id)->first();
            if($findUser){
                Auth::login($findUser);
                return redirect('/');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'social_type'=> 'google',
                    'user_type'=> 'user',
                    'password' => encrypt('my-google'),
                    'email_verified_at'=> Carbon::now()->toDateTimeString(),
                    'user_status'=>1
                ]);

                Auth::login($newUser);
                $user = user::find(Auth::user()->id);
                $user->assignRole('user');
                return redirect('/');
            }

        } catch (Exception $e) {
           dd($e->getMessage());

        }



    }
}
