<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('admin.auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success','You have successfully logged in!');
        }else{
            return redirect()->route('admin.login');
        }

        return back()->with('error', 'Your provided credentials do not match in our records.')->onlyInput('email');

    } 

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'password'   => 'required|min:5',
        ]);
        User::create([
            'first_name'      => $request->first_name,
            'last_name'       => $request->last_name,
            'name'            => $request->first_name.' '.$request->last_name,
            'email'           => $request->email,
            'password'        =>  Hash::make($request->password),
        ]);

        return redirect()->back();
    }


    /**
     * user detaile view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userProfile()
    {
        return view('admin.auth.user_profile_view');
    }

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')
            ->with('success', 'You have logged out successfully!');
    }
}
