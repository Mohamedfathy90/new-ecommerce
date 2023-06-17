<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('front.login');
    }

    public function adminloginpage()
    {
        return view ('admin.login');
    }
    
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        
        $request->authenticate();
        
        $request->session()->regenerate();

        
        
        if($request->is('admin/*') && auth()->user()->role !== 'admin'){
        auth()->logout();
        throw ValidationException::withMessages(['email'=>"please login with admin account !!"]);
        }

        else{
        switch(auth()->user()->role){
            case "admin" :
                return redirect()->intended("/admin/dashboard");
            
            case "vendor" :
                return redirect()->intended("/vendor/dashboard");
            
            case "user" :
                return redirect()->intended("/user/dashboard");
          }
        }
        

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
