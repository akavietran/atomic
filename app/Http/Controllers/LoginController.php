<?php

namespace App\Http\Controllers;

use App\Services\LoginService;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function index()
    {
        return view('Login.index');
    }

    public function authenticate(LoginRequest $request)
    {

        // $success = $this->loginService->authenticate($request->validated());
        // if ($success) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/');
        // }
        $success = $this->loginService->authenticate($request->validated());
        if ($success) {
            $request->session()->start();
            $request->session()->regenerate();
            return redirect()->route('index');  
        }

        return back()
            ->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])
            ->onlyInput('email');
    }
    public function logout(){
        $success = $this->loginService->logout();
       return redirect('/');
    }
}
