<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
    	return view('change_password');
    }

    public function update(Request $request)
    {
    	$oldPassword = $request->old;
    	$newPassword = $request->new;
    	$confirmPassword = $request->new_confirm;
    	$id = Auth::id();
    	$user = User::find($id);

    	if ($user) {
    		if($newPassword === $confirmPassword) {
    			if ((Hash::check($oldPassword, Auth::User()->password))) {
    				$user->password = Hash::make($newPassword);
    		    	$user->save();
    			}else
	    		{
	    			return redirect()->back()->with('danger', 'Wrong Old Password');
	    		}
	    	}else
    		{
    			return redirect()->back()->with('danger', 'New and Confirmed Passwords Do Not Match');
    		}

    		return redirect()->back()->with('success', 'Password Updated');
    	}
    	return redirect()->back()->with('danger', 'User not found');
    }
}
