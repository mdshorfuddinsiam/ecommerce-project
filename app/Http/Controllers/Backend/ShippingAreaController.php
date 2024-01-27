<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;

class ShippingAreaController extends Controller
{
    
    /////////////    Division Area    ///////////
	public function divisionView(){
		return view('backend.ship.division.division_view', [
			'divisions' => ShipDivision::orderBy('id', 'DESC')->get(),
		]);
	}


	public function divisionStore(Request $request){
		// dd($request->all());

		$validated = $request->validate([
			'division_name' => 'required|string|max:255|unique:ship_divisions',
		],[
			'division_name.required' => 'Division Name Must be Required',
		]);

		// ShipDivision::addNewDivision($request);
		ShipDivision::create($request->all());
		$notification = [
			'message' => 'Division Added Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->back()->with($notification);
	}


	public function divisionEdit(ShipDivision $ShipDivision){
		// dd($ShipDivision);

		return view('backend.ship.division.division_edit', [
			'ShipDivision' => $ShipDivision
		]);
	}


	public function divisionUpdate(Request $request, ShipDivision $ShipDivision){
		// dd($request->all());

		$validated = $request->validate([
			'division_name' => 'required|string|max:255|unique:ship_divisions',
		],[
			'division_name.required' => 'Division Name Must be Required',
		]);

		$ShipDivision->update($request->all());
		$notification = [
			'message' => 'Division Updated Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->route('division.all')->with($notification);
	}


	public function divisionDelete(ShipDivision $ShipDivision){
		$ShipDivision->delete();
		$notification = [
			'message' => 'Division successfully deleted!!',
			'alert-type' => 'warning',
		];
		return redirect()->back()->with($notification);
	}

	// Division (Active)
	public function divisionActive(ShipDivision $ShipDivision){
		$ShipDivision->update([
			'status' => '1',
		]);
		$notification = [
			'message' => 'Division Active successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->back()->with($notification);
	}

	// Division (In-active)
	public function divisionInactive(ShipDivision $ShipDivision){
		$ShipDivision->update([
			'status' => '0',
		]);
		$notification = [
			'message' => 'Division In-Active successfully!!',
			'alert-type' => 'warning',
		];
		return redirect()->back()->with($notification);
	}
    /////////////   End Division Area    ///////////


    /////////////    District Area    ///////////
	public function districtView(){
		return view('backend.ship.district.district_view', [
			'divisions' => ShipDivision::orderBy('division_name', 'ASC')->get(),
			'districts' => ShipDistrict::with('division')->orderBy('id', 'DESC')->get(),
		]);
	}

	public function districtStore(Request $request){
		// dd($request->all());

		$validated = $request->validate([
			'district_name' => 'required|string|max:255|unique:ship_districts',
			'division_id' => 'required',
		],[
			'district_name.required' => 'District Name Must be Required',
			'division_id.required' => 'Select One Division',
		]);

		// ShipDivision::addNewDivision($request);
		ShipDistrict::create($request->all());
		$notification = [
			'message' => 'District Added Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->back()->with($notification);
	}

	public function districtEdit(ShipDistrict $ShipDistrict){
		// dd($ShipDistrict);

		return view('backend.ship.district.district_edit', [
			'ShipDistrict' => $ShipDistrict,
			'divisions' => ShipDivision::orderBy('division_name', 'ASC')->get(),
		]);
	}

	public function districtUpdate(Request $request, ShipDistrict $ShipDistrict){
		// dd($request->all());

		$validated = $request->validate([
			'district_name' => 'required|string|max:255|unique:ship_districts',
			'division_id' => 'required',
		],[
			'district_name.required' => 'District Name Must be Required',
			'division_id.required' => 'Select One Division',
		]);

		// ShipDivision::addNewDivision($request);
		$ShipDistrict->update($request->all());
		$notification = [
			'message' => 'District Updated Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->route('district.all')->with($notification);
	}

	public function districtDelete(ShipDistrict $ShipDistrict){
		$ShipDistrict->delete();
		$notification = [
			'message' => 'District successfully deleted!!',
			'alert-type' => 'warning',
		];
		return redirect()->back()->with($notification);
	}

	// District (Active)
	public function districtActive(ShipDistrict $ShipDistrict){
		$ShipDistrict->update([
			'status' => '1',
		]);
		$notification = [
			'message' => 'District Active successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->back()->with($notification);
	}

	// District (In-active)
	public function districtInactive(ShipDistrict $ShipDistrict){
		$ShipDistrict->update([
			'status' => '0',
		]);
		$notification = [
			'message' => 'District In-Active successfully!!',
			'alert-type' => 'warning',
		];
		return redirect()->back()->with($notification);
	}
    /////////////   End District Area    ///////////


	/////////////    State Area    ///////////
	public function stateView(){
		return view('backend.ship.state.state_view', [
			'divisions' => ShipDivision::orderBy('division_name', 'ASC')->get(),
			'districts' => ShipDistrict::orderBy('district_name', 'ASC')->get(),
			'states' => ShipState::with('division','district')->orderBy('id', 'DESC')->get(),
		]);
	}

	// Get District Ajax
	public function getDistrictAjax($div_id){
		$data = ShipDistrict::where('division_id', $div_id)->orderBy('district_name', 'ASC')->get();
		return response()->json($data);
	}
	// End Get District Ajax

	public function stateStore(Request $request){
		// dd($request->all());

		$validated = $request->validate([
			'state_name' => 'required|string|max:255|unique:ship_states',
			'division_id' => 'required',
			'district_id' => 'required',
		],[
			'state_name.required' => 'State Name Must be Required',
			'division_id.required' => 'Select One Division',
			'district_id.required' => 'Select One District',
		]);

		ShipState::create($request->all());
		$notification = [
			'message' => 'State Added Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->back()->with($notification);
	}

	public function stateEdit(ShipState $ShipState){
		// dd($ShipState);

		return view('backend.ship.state.state_edit', [
			'ShipState' => $ShipState,
			'divisions' => ShipDivision::orderBy('division_name', 'ASC')->get(),
			'districts' => ShipDistrict::orderBy('district_name', 'ASC')->get(),
		]);
	}

	public function stateUpdate(Request $request, ShipState $ShipState){
		// dd($request->all());

		$validated = $request->validate([
			'state_name' => 'required|string|max:255|unique:ship_states',
			'division_id' => 'required',
			'district_id' => 'required',
		],[
			'state_name.required' => 'State Name Must be Required',
			'division_id.required' => 'Select One Division',
			'district_id.required' => 'Select One District',
		]);

		$ShipState->create($request->all());
		$notification = [
			'message' => 'State Updated Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->route('state.all')->with($notification);
	}

	public function stateDelete(ShipState $ShipState){
		$ShipState->delete();
		$notification = [
			'message' => 'State successfully deleted!!',
			'alert-type' => 'warning',
		];
		return redirect()->back()->with($notification);
	}

	// State (Active)
	public function stateActive(ShipState $ShipState){
		$ShipState->update([
			'status' => '1',
		]);
		$notification = [
			'message' => 'State Active successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->back()->with($notification);
	}

	// State (In-active)
	public function stateInactive(ShipState $ShipState){
		$ShipState->update([
			'status' => '0',
		]);
		$notification = [
			'message' => 'State In-Active successfully!!',
			'alert-type' => 'warning',
		];
		return redirect()->back()->with($notification);
	}
    /////////////   End State Area    ///////////
}
