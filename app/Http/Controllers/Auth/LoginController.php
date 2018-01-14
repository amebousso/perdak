<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\ThrottlesLogins;
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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function postLogin(Request $request, Guard $auth)
    {
          $logValue = $request->input('email');

      		$logAccess = 'email';//filter_var($logValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

          $throttles = in_array(
              ThrottlesLogins::class, class_uses_recursive(get_class($this))
          );

          if ($throttles && $this->hasTooManyLoginAttempts($request)) {
  			       return redirect('/'); //redirect()->back()('/accueil')
          				//->with('error', 'Nombre d\'essayé maximum atteint, veuillez patienter !')
          				//->withInput($request->only('email'));
          }

      		$credentials = [
      			$logAccess  => $logValue,
      			'password'  => $request->input('password')
      		];

      		if(!Auth::validate($credentials)) {
      			if ($throttles) {
      	            $this->incrementLoginAttempts($request);
      	        }

      			return redirect('/');//redirect()->back()
      				//('/accueil')->with('error', 'Votre email est érroné, veuillez réessayer !')
      				//->withInput($request->only('email'));
      		}

      		$user = Auth::getLastAttempted();

      		if ($throttles) {
              $this->clearLoginAttempts($request);
          }

      		Auth::login($user, $request->has('remember'));

      		if($request->session()->has('user_id'))	{
      				$request->session()->forget('user_id');
      		}
          $request->session()->put('statut', $user->role->slug);
      		return redirect('/accueil');
    }

    public function getLogout(Guard $auth)
    {
        $auth->logout();
        session()->forget('statut');
        return redirect('/');
    }
}
