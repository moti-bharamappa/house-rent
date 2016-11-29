<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/registered';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
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
        
        $digits = 5;
        $token = rand(pow(10, $digits-1), pow(10, $digits)-1);
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'token' => $token,
        ]);
        $options = [
            'recipients' => $data['email'],
            'subject'    => 'Verify Your Email Address',
            'from'       => env('FROM_EMAIL', null),
            'fromName'   => 'House Rent Team',
            'body'       => env('BASE_URL').'/confirm/?email='.$user['email']."&token=".$token
        ];
        Mail::send([], [], function ($message) use ($options) {
            $message->from($options['from'], $options['fromName']);
            $message->to($options['recipients'])->subject($options['subject']);
            $message->setBody($options['body'], 'text/html');
        });
        return $user;
    }
}
