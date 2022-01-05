<?php

namespace App\Http\Controllers\Auth\LandLord;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Password;
use Auth;


class LandLordResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::LANDLORDHOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:landlord');
    }

    protected function guard()
    {
        return Auth::guard('landlord');
    }

    protected function broker()
    {
        return Password::broker('landlords');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('landlord.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
