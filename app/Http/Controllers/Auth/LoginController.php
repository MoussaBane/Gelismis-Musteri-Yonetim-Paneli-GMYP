<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
//use Carbon\Carbon;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Hash;

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

    public function login(Request $request)
    {
        $user = User::where('name', $request->input('name'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);
            $this->authenticated($request, Auth::user());
            return redirect()->intended('home');
        } else {
            return redirect()->back()->withErrors(['error' => 'Kullanici Adi veya Sifre Hatalidir. Lutfen Kontrol Ederek Tekrar Deneyin !!!']);
        }
        //$credentials = $request->only('name', 'password');

        //if (Auth::attempt($credentials)) {

        //  return redirect()->intended('home');
        //} else {
        //  return redirect()->back()->withErrors(['error' => 'Kullanici Adi veya Sifre Hatalidir. Lutfen Kontrol Ederek Tekrar Deneyin !!!']);
        // }
    }

    //Password Reset for get
    public function passwordreset()
    {
        return view('password_reset');
    }

    //Password Reset for post
    public function passwordconfirmed(Request $request)
    {
        //dd($request);
        //$credentials = $request->only('email', 'password'); //for using Auth::attempt($credentials)

        $user = User::where('email', $request->email)->first(); //Check if user with that email exists
        if ($user) {

            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->intended('login')->with('status', 'Sifre Gunceleme Islemeniz Basariyla Gerceklestirilmistir !!! Yeni Sifrenizle Giris yapabilirsiniz !!!');
        } else {
            return redirect()->back()->withErrors(['error', 'Kayitlarimizda Bu Email Olan Bir Kullanici Bulunmamaktadir !!! Lufen Kontrol Ederek Tekrar Deneyin !!!']);
        }
    }

    //for last login information
    public function authenticated(Request $request,$user){
        $user->last_login = Carbon::now();
        $user->save();
    }

    //Google Login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    //Google Callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('email',$user->getEmail())->first();
        if($existingUser){
            Auth::login($existingUser);

            return redirect('home');
        }
        else{
            return redirect('login')->withErrors(['error' => 'Kullanici Kayitli Degildir!!! Lutfen Yeni Hesap Acarak Tekrar Deneyin.']);
        }
    }

    //Facebook Login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    //Facebook Callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        //$user->token;
    }
}