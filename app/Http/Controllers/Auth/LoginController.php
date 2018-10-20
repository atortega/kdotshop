<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\CustomUser;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
<<<<<<< HEAD

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        //dd(Socialite::driver('google'));
        return Socialite::driver('google')->redirect();
    }
=======

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        //dd(Socialite::driver('google'));
        return Socialite::driver($provider)->redirect();
    }


>>>>>>> 51bbbea5949bf38ab32b4f2679476f0e3bea8776
    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
=======
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
>>>>>>> 51bbbea5949bf38ab32b4f2679476f0e3bea8776
        } catch (\Exception $e) {
            return redirect('/login');
        }
        // only allow people with @company.com to login
        /*
        if(explode("@", $user->email)[1] !== 'company.com'){
            return redirect()->to('/');
        }
        */
        // check if they're an existing user
        $existingUser = CustomUser::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
<<<<<<< HEAD
            $newUser                  = new CustomUser;
            $newUser->last_name       = $user->name;
            $newUser->first_name      = $user->name;    
            $newUser->email           = $user->email;
            $newUser->provider        = 'google';
            $newUser->provider_id     = $user->id;
            $newUser->avatar          = $user->avatar;
            $newUser->avatar_original = $user->avatar_original;
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/home');
    }
    public function redirect($service) {
        return Socialite::driver ( $service )->redirect ();
    }

    public function callback($service) {
        $user = Socialite::with ( $service )->user ();
        return view ( '/home' )->withDetails ( $user )->withService ( $service );
    }
}
=======
            if ($provider == 'google') {
                $newUser = new CustomUser;
                $newUser->last_name = $user->name;
                $newUser->first_name = $user->name;
                $newUser->email = $user->email;
                $newUser->provider = 'google';
                $newUser->provider_id = $user->id;
                $newUser->avatar = $user->avatar;
                $newUser->avatar_original = $user->avatar_original;
            } else {
                $newUser = new CustomUser;
                $newUser->last_name = $user->name;
                $newUser->first_name = $user->name;
                $newUser->email = $user->email;
                $newUser->provider = 'twitter';
                $newUser->provider_id = $user->id;
                $newUser->avatar = $user->avatar;
                $newUser->avatar_original = $user->avatar_original;
            }
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/');
    }
    //  public function redirect()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    // public function callback()
    // {
    //     try {
    //         $user = Socialite::driver('facebook')->user();
    //     } catch (\Exception $e) {
    //         return redirect('/login');
    //     }
    //     // only allow people with @company.com to login
    //     /*
    //     if(explode("@", $user->email)[1] !== 'company.com'){
    //         return redirect()->to('/');
    //     }
    //     */
    //     // check if they're an existing user
    //     $existingUser = CustomUser::where('email', $user->email)->first();
    //     if($existingUser){
    //         // log them in
    //         auth()->login($existingUser, true);
    //     } else {
    //         // create a new user
    //         $newUser                  = new CustomUser;
    //         $newUser->last_name       = $user->name;
    //         $newUser->first_name      = $user->name;    
    //         $newUser->email           = $user->email;
    //         $newUser->provider        = 'facebook';
    //         $newUser->provider_id     = $user->id;
    //         $newUser->avatar          = $user->avatar;
    //         $newUser->avatar_original = $user->avatar_original;
    //         $newUser->save();
    //         auth()->login($newUser, true);
    //     }
    //     return redirect()->to('/home');
    
       
    // }
}
>>>>>>> 51bbbea5949bf38ab32b4f2679476f0e3bea8776
