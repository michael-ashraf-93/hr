<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function Show()
    {
        $countries = Country::paginate(10);
        return view('admin.view.viewCountries', compact('countries'));
    }

    public function addCountry()
    {
        return view('admin.addCountry');
    }

    public function Store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|max:250',
        ]);
        Country::create([
            'name' => $request['name'],
            'region_id' => $request['region'],
        ]);
        return redirect()->back();


    }


    public function CountryInRegion(Request $request)
    {
        $region = $request->region_id;
        $countries = Country::where('region_id', $region)->get();
        return view('admin.view.country-region', ['countries' => $countries]);
    }


    public function Destroy(Request $request)
    {
        Country::destroy($request->id);
        return response(['status' => true]);
    }
}
