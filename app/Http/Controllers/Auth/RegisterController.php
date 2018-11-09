<?php

namespace App\Http\Controllers\Auth;

use App\CustomUser;
use App\Models\CustomerVerificationCodes;

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
            'phone_number' => 'required|min:11|numeric',
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
            'phone_number' => $data['phone_number'],
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'birthdate' => $data['birthdate'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'status' => 'pending',
            'password' => Hash::make($data['password']),
        ]);

        $otp = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $code = new CustomerVerificationCodes();
        $code->customer_id = $user->customer_id;
        $code->verification_code = $otp;
        $code->save();

        //Send the verification code to user via sms
        $basic  = new \Nexmo\Client\Credentials\Basic('6d49c856', '6dsF7oesEXBWekMr');
        $client = new \Nexmo\Client($basic);

        $message = $client->message()->send([
            'to' => $user->phone_number,
            'from' => 'KDotShop',
            'text' => 'Thanks for registering with KDotShop Online. To activate your account, please enter this verification code: ' . $otp
        ]);
        //end sending sms

        $address = CustomersAddress::create([
           'customer_id' => $user->customer_id,
            'shipping_same_as_billing_address' => 0
        ]);

        return $user;
    }
}