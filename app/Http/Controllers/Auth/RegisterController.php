<?php

namespace App\Http\Controllers\Auth;

use App\CustomUser;
use App\Http\Controllers\Controller;
use App\Models\CustomersAddress;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
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
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:50',
            'middle_name' => 'string|max:50',
            'last_name' => 'required|string|max:50',
            'birthdate' => 'required|date',
            'email' => 'required|string|email|max:255|unique:customer',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  CustomUser::create([
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'birthdate' => $data['birthdate'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $address = CustomersAddress::create([
           'customer_id' => $user->customer_id,
            'shipping_same_as_billing_address' => 0
        ]);

        return $user;
    }
}