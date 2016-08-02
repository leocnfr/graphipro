<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Alert;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function register(Request $request,$type){
        if ($type=='particulier')
        {
            $this->validate($request,[
                'nom'=>'required',
                'prenom'=>'required',
                'email'=>'required|email|max:255|unique:users',
                'tel'=>'required|min:6',
                'address'=>'required',
                'post'=>'required|min:5',
                'ville'=>'required',
                'password'=>'required|min:6|confirmed'
            ]);
            User::create([
                'nom'=>$request->get('nom'),
                'prenom'=>$request->get('prenom'),
                'email'=>$request->get('email'),
                'tel'=>$request->get('tel'),
                'address'=>$request->get('address'),
                'post'=>$request->get('post'),
                'ville'=>$request->get('ville'),
                'password'=>bcrypt($request->get('password')),
                'type'=>$type
            ]);
        }else{
            $this->validate($request,[
                'nom'=>'required',
                'prenom'=>'required',
                'societe'=>'required',
                'email'=>'required|email|max:255|unique:users',
                'tel'=>'required|min:6',
                'address'=>'required',
                'post'=>'required|min:5',
                'ville'=>'required',
                'password'=>'required|min:6|confirmed',
                'societe'=>'required',
                'type'=>$type
            ]);
            User::create([
                'nom'=>$request->get('nom'),
                'prenom'=>$request->get('prenom'),
                'email'=>$request->get('email'),
                'tel'=>$request->get('tel'),
                'address'=>$request->get('address'),
                'post'=>$request->get('post'),
                'ville'=>$request->get('ville'),
                'password'=>bcrypt($request->get('password')),
                'type'=>$type,
                'societe'=>$request->get('societe')
            ]);
        }
        alert()->success('You have been  inscription.', 'Success!');
        return redirect('/');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        if(Auth::guard('web')->attempt(array('email' => $request->get('email'), 'password' => $request->get('password')))){
            alert()->success('Bonjour,'.Auth::guard('web')->user()->prenom, 'Success!');
            return redirect('/');
        }else{
            alert()->error('您的账号或密码有误','登录失败');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('login');
    }
}
