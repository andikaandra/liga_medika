<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\User;

class VerificationController extends Controller
{

    use VerifiesEmails;

    protected $redirectTo = '/home';


    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('signed')->only('verify');
        // $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verify($token)
    {
      try {
        $user = User::where('email_token',$token)->first();

        if (!$user) {
          throw new \Exception("Page not found", 404);
        }

        if ($user->verified) {
          return redirect('/login');
        }
        $user->verified = 1;
        $user->save();

      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], $e->getCode());
      }

      return redirect('/login')->with('verified',  'Your account has been successfully verified!');
      // return response()->json(['message' => 'Email verified.', 'user' => $user], 200);

      // return view('email.email-confirmed',['user'=>$user]);
    }
}
