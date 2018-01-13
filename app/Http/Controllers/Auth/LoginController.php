<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\ThrottlesLogins;

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
  			       return redirect()->back()
          				->with('error', 'Nombre d\'essayé maximum atteint, veuillez patienter !')
          				->withInput($request->only('email'));
          }

      		$credentials = [
      			$logAccess  => $logValue,
      			'password'  => $request->input('password')
      		];

      		if(!$auth->validate($credentials)) {
      			if ($throttles) {
      	            $this->incrementLoginAttempts($request);
      	        }

      			return redirect()->back()
      				->with('error', 'Votre email est érroné, veuillez réessayer !')
      				->withInput($request->only('email'));
      		}

      		$user = $auth->getLastAttempted();

      		if ($throttles) {
              $this->clearLoginAttempts($request);
          }

      		$auth->login($user, $request->has('remember'));

      		if($request->session()->has('user_id'))	{
      				$request->session()->forget('user_id');
      		}

      		return redirect('/accueil');
    }

    public function getLogout(Guard $auth)
    {
        $auth->logout();

        return redirect('/');
    }
}
