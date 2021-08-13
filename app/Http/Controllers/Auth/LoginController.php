<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo;



    /**
     * Create a new controller instance.
     *
     * @return void
     */




    public function __construct()
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            $this->redirectTo = route('home');
        } elseif (Auth::check() && Auth::user()->role == 'normal_user') {
            $this->redirectTo = route('user_home');
        }

        $this->middleware('guest')->except('logout');
    }


    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }        // only allow people with @company.com to login

        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {
            if ($existingUser->status) {
                auth()->login($existingUser, true);
            } else {
                return view('message')->with('message', 'Your account is blocked. please contact admin');
            }
        } else {
            // create a new user
            $newUser = new User();
            //return response()->json(["user" => $user]);
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->role = "normal_user";
            $newUser->provider_id = $user->id;
            $newUser->provider_type = "google";
            $newUser->profile_picture = $user->avatar;
            $newUser->password = Hash::make(random_int(10000000, 99999999));
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/home');
    }
}
