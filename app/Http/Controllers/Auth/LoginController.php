<?php

namespace Biblioteca\Http\Controllers\Auth;

use Biblioteca\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;
use Illuminate\Support\Facades\Auth;

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

    public function login(){
        return view('login');
    }

    public function authenticate(Request $request){

        $credentials = $request->only('name', 'password');

         if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        } else {
            return redirect()->back()->with('msg','Acesso Negado!');
        }

    }

    public function logout(){

        Auth::logout();

        return redirect()->intended('/login');

    }

}
