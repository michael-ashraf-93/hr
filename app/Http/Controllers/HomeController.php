<?php

namespace App\Http\Controllers;

use App\Department;
use App\Job;
use App\Location;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.home');
    }

    public function lang($lang)
    {
        session()->put('lang', $lang);
        return back();
    }

    public function back()
    {
        return redirect();
    }
}
