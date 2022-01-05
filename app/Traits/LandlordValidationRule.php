<?php

namespace App\Traits;

use Faker\Provider\Lorem;
use Illuminate\Support\Facades\Validator;

trait LandlordValidationRule
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'given_name' => ['sometimes', 'required', 'string', 'max:255'],
            'middle_name' => ['sometimes', 'nullable', 'string', 'max:255'],
            'family_name' => ['sometimes', 'required', 'string', 'max:255'],

            'contact_number'    =>  ['sometimes', 'required', 'regex:((^(\+)(\d){12}$)|(^\d{11}$))'],
            'address' => ['sometimes', 'required', 'string', 'max:255'],
            'photo' => ['sometimes', 'image', 'mimes:jpg,bmp,png', 'max:3048'],

            'email' => ['sometimes', 'required', 'string', 'email', 'max:255', 'unique:landlords,email,' . request()->id],
            'password' => ['sometimes', 'required', 'string', 'min:8'],
        ],[
            'given_name.required'    =>  'First name is required',
            'middle_name.required'    =>  'Middle name is required',
            'family_name.required'    =>  'Last name is required',
        ]);
    }
}