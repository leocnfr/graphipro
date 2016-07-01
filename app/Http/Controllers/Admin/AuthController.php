<?php
/**
 * Created by PhpStorm.
 * User: YANTAO
 * Date: 16/7/1
 * Time: 15:06
 */
namespace App\Http\Controllers\Admin;
use App\Admin;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $redirectTo = '/admin';
    protected $guard = 'admin';
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check())
        {
            return redirect('/admin');
        }
        return view('admin.auth.login');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|max:255|unique:admins',
            'password'=>'required|min:6|confirmed',
        ]);
        Admin::create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>bcrypt($request->get('passeword')),
        ]);
        alert()->success('You have been  inscription.', 'Success!');
        return view('admin.auth.login');

    }
    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }
    public function resetPassword()
    {
        return view('admin.auth.passwords.email');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            // Authentication passed...
            return redirect('/admin');
        }else{
            return redirect('/admin/login')->withInput();
        }
    }
}