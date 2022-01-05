<?php

namespace App\Http\Controllers\Admin;

use App\Traits\LandlordValidationRule;
use App\Models\Landlords\Landlord;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterLandLordController extends Controller
{
    use LandlordValidationRule;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showLandlordRegistrationForm()
    {
        return view('admin.landlord.register');
    }

    public function register(Request $request)
    {
        $data = $request->all();

        $this->validator($data)->validate();

        if ($request->hasFile('photo')) 
        {
            $photo = $this->upload($request->file('photo'));
            $data['photo'] = $photo;
        }
        else
        {
            $data['photo'] = null;
        }

        $landlord = $this->create($data);

        return redirect()->back()->with('success', 'Successfully registered');
    }

    public function create(array $data)
    {
        Landlord::create([
            'given_name'        =>      $data['given_name'],
            'middle_name'       =>      $data['middle_name'],
            'family_name'       =>      $data['family_name'],
            'contact_number'    =>      $data['contact_number'],
            'address'           =>      $data['address'],
            'email'             =>      $data['email'],
            'password'          =>      bcrypt($data['password']),
            'photo'             =>      $data['photo']
        ]);
    }

    public function upload($photo)
    {
        $fileName = time()."_".$photo->getClientOriginalName();
        $photo->storeAs('users/landlords', $fileName, 'public');

        return $fileName;
    }
}
