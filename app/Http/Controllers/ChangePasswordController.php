<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use App\User;


class ChangePasswordController extends Controller
{

    public function index() {
        return view('admin.user.changePassword');
    }


    public function update(ChangePasswordRequest $request,$id){
        $input['password'] = Hash::make($request['password']);
        if(Auth::attempt(['user_id'=>Auth::user()->user_id,'password'=>$request->oldPassword])){
               User::where('user_id', Auth::user()->user_id)->update($input);
                return redirect()->back()->with(['message'=>'Password successfully updated !','alert-type'=>'success']);
        }else{
            return redirect()->back()->with(['message'=>'Old Password does not match','alert-type'=>'error']);
        }
    }

}
