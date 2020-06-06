<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        // $googleUser = Socialite::driver('google')->stateless()->user();

        // $users = User::where(['email' => $googleUser->getEmail()])->first();

        // if ($users) {
        //     Auth::login($users);
        //     return redirect('/');

        // } else {
        //     $user = User::create([
        //         'name'       => $googleUser->getName(),
        //         'email'      => $googleUser->getEmail(),
        //         'token'      => $googleUser->token,
        //         'expires_in' => $googleUser->expiresIn
        //     ]);

        //     return redirect()->route('home');
        // }

        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->route('home');
            } else {
                $newUser = User::create(
                    [
                        'name'        => $user->name, 
                        'email'       => $user->email, 
                        'provider'    => 'google',
                        'provider_id' => $user->id
                    ]
                );
                
                Auth::login($newUser);
                return redirect()->route('home');
            }
        } catch(Exception $e) {
            return redirect('/');
        }

    }
}
