<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
	
        
        return view('login');
    }

    public function login(Request $request)
    {
	
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
           
            $user = Auth::user();
            Session::put('user', $user);

            return response()->json([
                'error' => false,
                'message' => 'Login successfully',
                'url' => '/admin/dashboard',

            ]);
        }
        else {
            return response()->json([
                'error' => true,
                'message' => 'Wrong username or password',
                'url' => '',

            ]);
        }
        

    }

}





