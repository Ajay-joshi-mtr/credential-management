<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{   
    public function index(){
        $user = User::all();
        return view('admin.profile.index',compact('user'));
    }
    public function show($id){

    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.profile.edit',compact('user'));
    }

    public function update(Request $request, User $profile)
    {      
        $profile->eid = $request->input('eid');
        $profile->name = $request->input('name');
        $profile->role = $request->input('role');
        $profile->email = $request->input('email');
        $profile->phone = $request->input('phone');
        
        $request->validate([

            'phone'=>'required|min:10|numeric',
        ]);
        $profile->update();
        return redirect(route('profile.index'));
    }

    public function change_password($id)
    {   
        $user = User::find($id);
        // dd('jkdkjh');
        return view('admin.profile.changepassword');
    }

    public function update_password(Request $request, User $profile)
    {   
        if(!Hash::check($request->current_password, Auth::user()->password)){
            return redirect()->back()->with('error','Current Password Does not Match');
        }
        if(strcmp($request->get('current_password'),$request->get('new_password'))==0){
            return redirect()->back()->with('error','Current Password and New Password cannot be same');
        }
             
        $request->validate([

            'current_password' =>'required',
            'new_password'=>'required',
            'confirm_password'=>'required|same:new_password',
        ]);
        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->update();
        return back()->with('success','Password Changed Successfully');
        // dd('done');
        return redirect(route('profile.index'));
    }
}
