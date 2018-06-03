<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function check(Request $request)
    {
        $email=$request->email;
        if(isset($email)) {
            $user=User::where('email',$email)->first();
            if(isset($user)) {
                if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
                    return redirect('/');
                } else {
                    return back()->withErrors([

                        'message' => 'Please check your credentials an try again.'
                    ]);
                }
            }
            else
            {
                return back()->withErrors([

                    'message' => 'User Does Not Exist.'
                ]);
            }
        }
        else
            return back()->withErrors([

                'message' => 'Please enter your email and password.'
            ]);
    }


    public function create()
    {
        return view('auth.register');
    }


    public function store(Request $request)
    {
//        dd($request);
        $this->validate(request(), [
            'fname' => 'required|max:50',
            'lname' => 'required|max:50',
            'phone' => 'required|max:50',
            'gender' => 'required|max:150',
            'email' => 'required|max:50',
            'password' => 'confirmed|required|max:50'
        ]);

        $company = Company::create([
           'name' => $request['company'],
        ]);

        $user = User::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'company_id' => $company->id,
            'phone' => $request['phone'],
            'gender' => $request['gender'],
            'role' => 'hr',
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);
        auth()->login($user);
        return redirect('/');
    }

    public function logout(Request $request) {
//        Auth::logout();
        Auth::logout();
        return view('auth.login');
    }
}
