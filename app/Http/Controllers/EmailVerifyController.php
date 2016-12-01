<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmailVerifyController extends Controller
{
    public function verify(Request $request)
    {
        $userID = DB::table('users')
               ->where('email', $request->input('email'))
               ->where('token', $request->input('token'))->value('id');

        if ($userID) {
            DB::table('users')
                  ->where('id', $userID)
                  ->update([ 'status'  => 1]);
            return redirect('/login');
        } else {
            return "Verification Failed";
        }
    }

    public function verifyToken(Request $request)
    {
        $userID = DB::table('users')
               ->where('email', $request->input('email'))
               ->where('token', $request->input('token'))
               ->value('id');

        if ($userID) {
            DB::table('users')
                  ->where('id', $userID)
                  ->update([ 'status'  => 1]);

                  Auth::loginUsingId($userID);
                  return redirect('/home');
        } else {
            return redirect('/verification');
        }
    }

    public function loadForm(Request $request)
    {
        return view('ads.verification');
    }
}
