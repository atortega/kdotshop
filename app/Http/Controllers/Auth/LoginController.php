<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;
Use App\CustomUser;
use App\SocialIdentity;

class LoginController extends Controller

{
	
	use AuthenticatesUsers;
		
   public function redirectToProvider($provider)
   {
       return Socialite::driver($provider)->redirect();
   }

   public function handleProviderCallback($provider)
   {
       try {
           $user = Socialite::driver($provider)->user();
       } catch (Exception $e) {
           return redirect('/login');
       }

       $authUser = $this->findOrCreateUser($user, $provider);
       Auth::login($authUser, true);
       return redirect($this->redirectTo);
   }


   public function findOrCreateUser($providerUser, $provider)
   {
       $account = SocialIdentity::whereProviderName($provider)
                  ->whereProviderId($providerUser->getId())
                  ->first();

       if ($account) {
           return $account->user;
       } else {
           $user = CustomUser::whereEmail($providerUser->getEmail())->first();

           if (! $user) {
               $newUser                  = new CustomUser;
            $newUser->last_name       = $user->name;
            $newUser->first_name      = $user->name;    
            $newUser->email           = $user->email;
            $newUser->avatar          = $user->avatar;
            $newUser->avatar_original = $user->avatar_original;
            $newUser->save();
            auth()->login($newUser, true);
           }

           $user->identities()->create([
               'provider_id'   => $providerUser->getId(),
               'provider_name' => $provider,
           ]);

           return $user;
       }
   }

}