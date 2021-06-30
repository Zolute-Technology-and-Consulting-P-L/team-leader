<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\User;
use Exception;

class Login extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function authentication(LoginRequest $request){

        try {
            $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->route('dashboard')
                            ->withSuccess('Signed in');
            }
            throw new Exception('Login details are not valid!');
        } catch (\Exception $ex) {
           return redirect()->route('login')->withError($ex->getMessage());
        }
        

        

      

    }
}
