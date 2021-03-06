<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
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
    protected $redirectTo = 'admin/products';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('admin.guest')->except('logout');
    }
     protected function guard()
    {
        return Auth::guard('admin');
    }
     public function showLoginForm()
    {   
        return view('adminauth.adminLogin');
    }
    public function logout(Request $request)
    {  
        $this->guard('admin')->logout();
        // dd($request->session());
        // $request->session()->invalidate();

        return redirect('admin/login');
    }
}
