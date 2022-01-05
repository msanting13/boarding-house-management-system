<?php

namespace App\Http\Controllers\Auth\LandLord;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LandLordLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:landlord')->except('logout');
    }
    public function login()
    {
        return view('landlord.auth.login');
    }

    public function loginLandlord(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      // Attempt to log the user in
      if (Auth::guard('landlord')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('landlord.dashboard'));
      }
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withErrors(['error' => 'Please check your email/password.'])->withInput($request->only('email'));
    }
/**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('landlord')->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route('landlord.auth.login');
    }
    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        //
    }
}
