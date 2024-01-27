<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Image;

use Illuminate\Support\Facades\Hash;

class AdminUserRoleController extends Controller
{
    
	public function allAdminRole(){
		$adminUsers = Admin::where('type', 2)->latest()->get();
		return view('backend.role.admin_role_all', compact('adminUsers'));
	}

	public function addAdminRole(){
		return view('backend.role.admin_role_create');
	}


	public function storeAdminRole(Request $request){

		// dd($request->all());

		if($request->hasFile('profile_photo_path')){
		    // dd(5);
		    $file = $request->file('profile_photo_path');
		    $imageName = 'admin_profile-'.time().rand(1,1000).'.'.$file->getClientOriginalExtension();
		    $directory = 'upload/admin_images/';
		    Image::make($file)->resize(225,225)->save($directory.$imageName);
		    // $file->move($directory, $imageName);
		    $data['profile_photo_path'] = $directory.$imageName;
		    $data['password'] = Hash::make($request->password);
		    $data['type'] = '2';
		}
		else{
		    $data['profile_photo_path'] = '';
		    $data['password'] = Hash::make($request->password);
		    $data['type'] = '2';
		    // dd($data);
		}

		Admin::create(array_merge($request->all(), $data));
		$notification = [
			'message' => 'Admin Profile Created Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->route('all.admin.user')->with($notification);
	}


	public function editAdminRole($id){
		$adminUser = Admin::findOrFail($id);
		return view('backend.role.admin_role_edit', compact('adminUser'));
	}


	public function updateAdminRole(Request $request, $id){

		// dd($request->all());

		$adminUser = Admin::findOrFail($id); 

		if($request->hasFile('profile_photo_path')){
		    // dd(5);
		    $file = $request->file('profile_photo_path');
		    $imageName = 'admin_profile-'.time().rand(1,1000).'.'.$file->getClientOriginalExtension();
		    $directory = 'upload/admin_images/';
		    Image::make($file)->resize(225,225)->save($directory.$imageName);
		    // $file->move($directory, $imageName);
		    $data['profile_photo_path'] = $directory.$imageName;
		    $data['type'] = '2';
		}
		else{
		    $data['profile_photo_path'] = $adminUser->profile_photo_path;
		    $data['type'] = '2';
		    // dd($data);
		}

		if(!isset($request->brand)){
			$data['brand'] = '';
		}
		if(!isset($request->category)){
			$data['category'] = '';
		}
		if(!isset($request->product)){
			$data['product'] = '';
		}
		if(!isset($request->slider)){
			$data['slider'] = '';
		}
		if(!isset($request->coupon)){
			$data['coupon'] = '';
		}
		if(!isset($request->shipping)){
			$data['shipping'] = '';
		}
		if(!isset($request->blog)){
			$data['blog'] = '';
		}
		if(!isset($request->setting)){
			$data['setting'] = '';
		}
		if(!isset($request->orders)){
			$data['orders'] = '';
		}
		if(!isset($request->returnorder)){
			$data['returnorder'] = '';
		}
		if(!isset($request->stock)){
			$data['stock'] = '';
		}
		if(!isset($request->review)){
			$data['review'] = '';
		}
		if(!isset($request->reports)){
			$data['reports'] = '';
		}
		if(!isset($request->alluser)){
			$data['alluser'] = '';
		}
		if(!isset($request->adminuserrole)){
			$data['adminuserrole'] = '';
		}


		$adminUser->update(array_merge($request->all(), $data));
		$notification = [
			'message' => 'Admin Profile Updated Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->route('all.admin.user')->with($notification);
	}


	 public function deleteAdminRole($id){
        $adminUser = Admin::find($id);
        if(file_exists($adminUser->profile_photo_path)){
            unlink($adminUser->profile_photo_path);
        }

        $adminUser->delete();
    	$notification = [
    		'message' => 'Admin User Deleted Successfully!!',
    		'alert-type' => 'warning',
    	];
    	return redirect()->back()->with($notification);
    }



}
