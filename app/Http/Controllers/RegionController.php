<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function Show()
    {
        $regions = Region::paginate(10);
        return view('admin.view.viewRegions', compact('regions'));
    }


    public function Store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|max:250',
        ]);
        Region::create([
            'name' => $request['name'],
            'company_id' => auth()->user()->company_id,
        ]);
        return redirect()->back();


    }

    public function Destroy(Request $request)
    {
        Region::destroy($request->id);
        return response(['status' => true]);
    }

}
