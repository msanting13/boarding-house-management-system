<?php

namespace App\Http\Controllers\Auth\LandLord;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Landlords\Landlord;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Traits\LandlordValidationRule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandLordRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, LandlordValidationRule;

    /**
     * Where to redirect users after registration.
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return App\Models\Landlords\Landlord
     */
    protected function create(array $data)
    {
        return Landlord::create([
            'given_name' => $data['given_name'],
            'family_name' => $data['family_name'],
            'contact_number' => $data['contact_number'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        // return view('auth.landlord.register');
        return view('register-landlord');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('landlord');
    }
}
