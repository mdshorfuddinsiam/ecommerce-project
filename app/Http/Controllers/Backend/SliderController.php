<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    
	public function index(){
		return view('backend.slider.index', ['sliders' => Slider::latest()->get()]);
	}

	public function store(Request $request){
		// dd($request->all());

		$validated = $request->validate([
			// 'title_en' => 'string|unique:sliders',
			// 'title_bn' => 'string|unique:sliders',
			// 'description_en' => 'string|unique:sliders',
			// 'description_bn' => 'string|unique:sliders',
			'slider_image' => 'mimes:jpeg,jpg,png,gif|required|max:2048' // max 10000kb
		],[
			// 'title_en.string' => 'Title English must be in string',
			// 'title_en.string' => 'Title Bangla must be in string',
			// 'description_en.string' => 'Description English must be in string',
			// 'description_bn.string' => 'Description Bangla must be in string',
			'slider_image.required' => 'Slider Image field is Required',
			// 'title_en.unique' => 'Please insert new Title En',
		]);

		Slider::addNewSlider($request);
		$notification = [
			'message' => 'Slider Added Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->back()->with($notification);
	}

	public function edit(Slider $slider){
		return view('backend.slider.edit', ['slider' => $slider]);
	}

	public function update(Request $request, Slider $slider){
		// dd($request->all());
		// dd($id);

		// $validated = $request->validate([
		// 	// 'title_en' => 'string|unique:sliders',
		// 	// 'title_bn' => 'string|unique:sliders',
		// 	// 'description_en' => 'string|unique:sliders',
		// 	// 'description_bn' => 'string|unique:sliders',
		// 	'slider_image' => 'mimes:jpeg,jpg,png,gif|required|max:2048' // max 10000kb
		// ],[
		// 	// 'title_en.string' => 'Title English must be in string',
		// 	// 'title_en.string' => 'Title Bangla must be in string',
		// 	// 'description_en.string' => 'Description English must be in string',
		// 	// 'description_bn.string' => 'Description Bangla must be in string',
		// 	'slider_image.required' => 'Slider Image field is Required',
		// 	// 'title_en.unique' => 'Please insert new Title En',
		// ]);

		Slider::updateSlider($request, $slider);
		$notification = [
			'message' => 'Slider Updated Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->route('slider.all')->with($notification);
	}

	public function delete(Slider $slider){
        if(file_exists($slider->slider_image)){
            unlink($slider->slider_image);
        }
        $slider->delete();
        $notification = [
			'message' => 'Slider Deleted Successfully!!',
			'alert-type' => 'Warning',
		];
		return redirect()->back()->with($notification);
    }

    public function active(Slider $slider){
		$slider->update(['status' => 1]);
		$notification = [
			'message' => 'Slider Status Updated Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->back()->with($notification);
	}

	public function inactive(Slider $slider){
		$slider->update(['status' => 0]);
		$notification = [
			'message' => 'Slider Status Updated Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->back()->with($notification);
	}


}
