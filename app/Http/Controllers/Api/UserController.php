<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function login(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    	if (Auth::attempt($arr)) {
            return 'true';
        } else {
            return 'false';
        }
    }

    public function registion(Request $request)
    {
        if (!User::where('email', $request->email)->first()) {
            $attr = [
                'fullname' => $request->fullname,
                'address' => $request->address,
                'city' => $request->city,
                'gender' => $request->gender,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ];
            User::create($attr);
            
            return 1;
        } else {
            return 0;
        }
    }

    public function getUser()
    {
        return User::get();
    }

    public function checkEmail(Request $request)
    {
        $user = User::where('email', $request->email)->count();
        if ($user == 0) {
            return 0;
        } else {
            return 1;
        }
    }
}
