<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthGoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {            
        
            $googleUser = Socialite::driver('google')->user();
            $existUser = User::where('email',$googleUser->email)->first();            

            if($existUser) {
                Auth::loginUsingId($existUser->id);
                // return redirect('/password');
            }
            else {
                $user = new User;
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                $user->role = 'user';
                $user->google_id = $googleUser->id;
                $user->password = '';
                $user->markEmailAsVerified();
                $user->save();
                // return redirect()->to('/password');
            // Auth::loginUsingId($user->id);
            }
            return redirect()->to('/password');
        } 
        catch (Exception $e) {
            return 'error';
        }
    }
    public function enter_password()
    {
        $user = User::all();
        return view('auth.password',compact('user'));
    }
    public function register_password(Request $request, User $user)
    {   
        $user->password = Hash::make($request->input('password'));
        // $request->validate([

        //     'password'=>'required|min:8',
        //     'password_confirmation'=>'required|same:new_password',
        // ]);
        $user->update();
        $request->flash("updated");
        // dd($request->all());
        // return route('/home');
    }
}



// 138088789993-gji9uq39h63hgva3s8qj33uon4oertv9.apps.googleusercontent.com
// VwNUJ_edFDMhf7fCKqvrR4M4