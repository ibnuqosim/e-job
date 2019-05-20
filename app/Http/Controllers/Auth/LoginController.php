<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use App\users;


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

    use AuthenticatesUsers{
        logout as performLogout;
    }

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
    public function logout(Request $request)
    {
    // do the normal logout
    $this->performLogout($request);
    
    // redirecto to sso
    return redirect()->away('https://sso.krakatausteel.com');
    }
    
    public function programaticallyEmployeeLogin(Request $request, $personnel_no, $email)
    {
    $personnel_no = base64_decode($personnel_no);
    $email = base64_decode($email);
    // $userBoss = new User();
    // $nikboss = $userBoss->setNikBoss($personnel_no);

    try {
    // find all the details
    // $user = User::where('id', $personnel_no)->first();
    // $boss = User::find($nikboss);
    
    // insert user
    // if (!isset($user)) { 
    // // create the new user
    // $saveuser = new User();
    // $saveuser->saveEmployee($personnel_no, $email);
    // $userrole = User::find($personnel_no);
    // $userrole->assignRole(['employee']);
    // }

    // insert boss
    // disini
    // if(!isset($boss))
    // {
    // // create the new boss
    // $saveboss = new user();
    // $saveboss->saveMinManager($personnel_no);
    // $bossrole = User::find($nikboss);
    // $bossrole->assignRole(['employee','boss']);

    // }

    // Programmatically login user
    $userlogin = users::where('userid', $personnel_no)->first();
    //dd($userlogin);
    if(is_null($userlogin)){
        return redirect('https://sso.krakatausteel.com');
    }else{
        Auth::loginUsingId($userlogin->id);
        return redirect()
        ->route('home');
    }
    
    } catch (ModelNotFoundException $e) {
    
    return redirect('https://sso.krakatausteel.com');
    }

    return $this->sendLoginResponse($request);
    }
}
