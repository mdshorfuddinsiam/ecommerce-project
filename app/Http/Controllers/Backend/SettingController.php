<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SiteSetting;
use App\Models\SeoSetting;
use Image;

class SettingController extends Controller
{
    
	public function siteSetting(){
		$siteSetting = SiteSetting::find(1);
		return view('backend.setting.site_setting', compact('siteSetting'));
	}

	public function updateSiteSetting(Request $request, $id){

		$siteSetting = SiteSetting::find($id);

		if($request->hasFile('logo')){
            if(file_exists($siteSetting->logo)){
                unlink($siteSetting->logo);
            }

            $file = $request->file('logo');
            $imageName = 'logo-'.time().rand(1,1000).'.'.$file->getClientOriginalExtension();
            $directory = 'upload/logo/';
            Image::make($file)->resize(139,36)->save($directory.$imageName);
            $imgUrl = $directory.$imageName;

            $data['logo'] = $imgUrl;
        }
        else{
            $data['logo'] = $siteSetting->post_image;
        }

		$siteSetting->update(array_merge($request->all(), $data));
		$notification = [
    		'message' => 'Site Setting Updated Successfully!!',
    		'alert-type' => 'info',
    	];
    	return redirect()->back()->with($notification);
	}


    public function seoSetting(){
        $seoSetting = SeoSetting::find(1);
        return view('backend.setting.seo_setting', compact('seoSetting'));
    }


    public function updateSeoSetting(Request $request, $id){  

        SeoSetting::findOrFail($id)->update($request->all());
        $notification = [
            'message' => 'Seo Setting Updated Successfully!!',
            'alert-type' => 'info',
        ];
        return redirect()->back()->with($notification);
    }



}
