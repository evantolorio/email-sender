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
        try {
            $user = Socialite::driver('google')->stateless()->user();

            $findUser = User::where('provider_id', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->route('home');
            } else {
                // Determine email
                $center = '';

                $emailCalamba  = env('MAIL_CL_USERNAME');
                $emailCabuyao  = env('MAIL_CY_USERNAME');
                $emailSanPablo = env('MAIL_SP_USERNAME');
                $emailStaCruz  = env('MAIL_SC_USERNAME');
                $emailSiniloan = env('MAIL_SL_USERNAME');

                switch ($user->email) {
                    case $emailCalamba:
                        $center = 'cl';
                        break;

                    case $emailCabuyao:
                        $center = 'cy';
                        break;

                    case $emailSanPablo:
                        $center = 'sp';
                        break;
                    
                    case $emailStaCruz:
                        $center = 'sc';
                        break;

                    case $emailSiniloan:
                        $center = 'sl';
                        break;
                    
                    default:
                        $center = 'lb';
                        break;
                }

                $newUser = User::create(
                    [
                        'name'        => $user->name, 
                        'email'       => $user->email, 
                        'provider'    => 'google',
                        'provider_id' => $user->id,
                        'center'      => $center
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
