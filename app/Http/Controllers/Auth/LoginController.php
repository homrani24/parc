<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;

//use App\Http\Controllers\Auth;
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
    protected $redirectTo = '/home';

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
     * Create login controlleur.
     *
     * 
     */
    public function login(Request $request){
        //dd($request->all());
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))
        {
            $user= User::where('email',$request->email)->first();
            if($user->is_active()){
             if($user->role=='admin'){
             return redirect()->route('admin');   
             }
             else if($user->role=='technicien'){
             return redirect()->route('technicien');   
             }
             else if($user->role=='user'){
             return redirect()->route('user');   
             }
             else if($user->role=='supervisseur'){
             return redirect()->route('supervisseur');   
             }
             else{
                return redirect()->route('home');   
             }
            }
            else{
             return redirect()->route('404');   

            }

        }
        return redirect()->back();   


        
    }
}
