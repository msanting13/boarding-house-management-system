<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Landlords\Landlord;
use App\Traits\LandlordValidationRule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandLordController extends Controller
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

    public function landLordDataSource()
    {
        $landlords = Landlord::query()->select('*');

        return DataTables::of($landlords)
            ->addColumn('action', 'admin.landlord.actions.manage-button')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.landlord.index');
    }

    public function show($id)
    {
        $landlord = Landlord::find($id);

        return view('admin.landlord.show', compact('landlord'));
    }

    public function edit($id)
    {
        $landlord = Landlord::find($id);
        return view('admin.landlord.edit', compact('landlord'));
    }

    public function update(Request $request, $id)
    {
        $landlord = Landlord::find($id);
        $this->validator($request->all())->validate();

        if ($request->type === "information") {
            $landlord->email = $request->email;
            $landlord->given_name = $request->given_name;
            $landlord->middle_name = $request->middle_name;
            $landlord->family_name = $request->family_name;
            $landlord->contact_number = $request->contact_number;
            $landlord->address = $request->address;
            $landlord->save();
        }

        if ($request->type === "photo") {
            if ($request->hasFile('photo')) 
            {
                $photo = $this->upload($request->photo);
                $landlord->photo = $photo;
                $landlord->save();
            }
        }

        return redirect()->back()->with('success', 'Update successfully');
    }

    public function changePassword($id)
    {
        $landlord = Landlord::find($id);
        return view('admin.landlord.change-password', compact('landlord'));
    }

    public function upadatePassword(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $landlord = Landlord::find($id);
        $landlord->password = bcrypt($request->password);
        $landlord->save();

        return redirect()->back()->with('success', 'Password changed successfully');
    }

    public function upload($photo)
    {
        $fileName = time()."_".$photo->getClientOriginalName();
        $photo->storeAs('users/landlords', $fileName, 'public');

        return $fileName;
    }

    public function destroy(Request $request, $id)
    {
        $landlord = Landlord::find($id);
        $landlord->delete();

        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
