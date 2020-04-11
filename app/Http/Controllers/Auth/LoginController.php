<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use Auth;
use App\Doctor;

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
        $this->middleware('guest:doctor')->except('logout');
        // $this->middleware('guest:web')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }
    public function showDoctorLoginForm()
    {
        return view('auth.login', ['url' => 'doctor']);
    }

    public function doctorLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('doctor')->attempt($credentials)) {

            return redirect()->intended('/doctor');
            
        }
        else{dd('error');}
        return back()->withInput($request->only('email', 'remember'));
    }
    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

           // return Redirect::action('LoginController@index');
           // return redirect()->action('Auth\LoginController@index');

        return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function index()
    {
        return view('admin');
    }
}
