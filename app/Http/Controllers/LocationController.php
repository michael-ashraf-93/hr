<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{


    public function Show()
    {
        $locations = Location::paginate(10);
        return view('admin.view.viewLocations', compact('locations'));
    }


    public function Create()
    {
        return view('admin.add.addLocation');
    }

    public function Store(Request $request)
    {
        $this->validate(request(), [
            'street_address' => 'required|max:250',
            'postal_code' => 'required|max:250',
            'city' => 'required|max:250',
            'country' => 'required|max:250',
        ]);
        Location::create([
            'street_address' => $request->street_address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'country_id' => $request->country,
        ]);
        return redirect('/Locations');


    }


//    public function Destroy($id)
//    {
//        $location = Location::find($id);
//        $location->delete($id);
//        return redirect('/Locations');
//    }

    public function Destroy(Request $request)
    {
        Location::destroy($request->id);
        return response(['status' => true]);
    }

}
