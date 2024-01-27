<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
// use Illuminate\Support\Facades\Auth;
use Auth;

use App\Models\User;

class AdminProfileController extends Controller
{
    public function adminProfile(){
    	// $adminData = Admin::find(1);
    	$adminData = auth()->guard('admin')->user();
    	return view('admin.profile.admin_profile_view', compact('adminData'));
    	// dd(auth()->guard('admin')->user());
    }

    public function adminProfileEdit(){
    	$editData = auth()->guard('admin')->user();
    	return view('admin.profile.admin_profile_edit', compact('editData'));
    }

    public function adminProfileUpdate(Request $request){
    	// return $request->all();
    	$updateData = Auth::guard('admin')->user();
    	Admin::adminProfileUpdate($request, $updateData);

    	$notification = array(
            'message' => 'Admin Profile Successfully Updated!!!',
            'alert-type' => 'success'
        );
    	return redirect()->route('admin.profile')->with($notification);
    }
    
    public function adminChangePassword(){
        return view('admin.profile.admin_change_password');
    }

    public function updateChangePassword(Request $request){
         // dd($request->all());

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        return Admin::updateChangePassword($request);
    }



    // All Users View
    public function allUsers(){
        $users = User::latest()->get();
        return view('backend.user.all_user', compact('users'));
    }


}
