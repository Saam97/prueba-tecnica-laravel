<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login.index', [
            'titulo' => 'Iniciar Sesion'
        ]);
    }

    public function login(LoginRequest $request) {
        $credentials = request()->only('email', 'password');

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken('token-name')->plainTextToken;
            
            if($user->admin == 1){
                request()->session()->regenerate();
                return redirect()->route('admin-index');
            }elseif($user->admin !== 1) {
                return redirect()->route('user.index');
            }else{
                return redirect()->route('admin-index');
            }
        }
        return redirect()->route('login.index')->with('error', 'Contraseña incorrecta');
    }

    public function logout(Request $request) {
        
        if ($request->isMethod('post')) {
            Auth::logout(); 
            $request->session()->invalidate(); 
            $request->session()->regenerateToken(); 
            return redirect()->route('login.index');
        }
    }

}