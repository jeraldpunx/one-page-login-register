<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth, Request, Session, Redirect;
// use Illuminate\Foundation\Auth\RegistersUsers;

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

    // use AuthenticatesUsers, RegistersUsers {
    //     AuthenticatesUsers::redirectPath insteadof RegistersUsers;
    //     AuthenticatesUsers::getGuard insteadof RegistersUsers;
    //     login as traitLogin;
    //     register as traitRegister;
    // }

    // protected function authenticated(Request $request, $user)
    // {
    //     return auth()->user();
    //     if ( auth()->user()->hasRole('admin') ) {// do your margic here
    //         return redirect()->route('/admin/home');
    //     }

    //      return redirect('/home');
    // }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/home';

    // public function redirectTo(){
        // dd(auth()->user()->role);

        // User role
        // $role = auth()->user()->role;
        // // dd($role); 
        // // Check user role
        // switch ($role) {
        //     case 'admin':
        //             return '/admin/home';
        //         break;
        //     case 'user':
        //             return '/home';
        //         break; 
        //     default:
        //             return '/login'; 
        //         break;
        // }
    // }


    // public function login(Request $request)
    // {
    //     //Set session as 'login'
    //     Session::put('last_auth_attempt', 'login');
    //     //The trait is not a class. You can't access its members directly.
    //     return $this->traitLogin($request);
    // }


    // public function register(Request $request)
    // {
    //     //Set session as 'register'
    //     Session::put('last_auth_attempt', 'register');
    //     //The trait is not a class. You can't access its members directly.
    //     return $this->traitRegister($request);
    // }


    // public function postLogin() {
    //     if (Auth::attempt ( array (
    //             'email' => Request::get ( 'login-email' ),
    //             'password' => Request::get ( 'login-password' ) 
    //     ) )) {
    //         session ( [ 
    //                 'email' => Request::get ( 'login-email' ) 
    //         ] );
    //         return Redirect::back ();
    //     } else {
    //         Session::flash ( 'message-login', "Invalid Email or Password , Please try again." );
    //         return Redirect::back ();
    //     }
    // }


    public function logout() {
        Session::flush ();
        Auth::logout ();
        return Redirect::back ();
    }
}
