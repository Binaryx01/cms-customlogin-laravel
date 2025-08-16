<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // ← add this line
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function showLoginForm()
    {

        return view('auth.login');

    }


    public function showRegisterForm()
    {
        return view ('auth.register');
    }



public function login(Request $request)
{
    // Validate the request
    $request->validate([
        'email' => 'required|email',      // Removed extra spaces around the pipe
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    // Attempt login
    if (Auth::attempt($credentials)) {
       
        $request->session()->regenerate();  // Prevent session fixation
        return redirect()->intended('/dashboard');
    }

    // Return back with error
   
    return back()->withErrors([
        
        'email' => 'Invalid credentials',
    ])->onlyInput('email');  // Keep the email input filled
}


    







        public function register(Request $request)
        {
            $request->validate([

                'name'=>'required|string|max:255',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|confirmed',

            ]);

            $user =User::create([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> Hash::make($request->password),
            ]);


            Auth::login($user);
            return redirect('/dashboard');
            
        }




        public function logout(Request $request)
        {

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('login');
            

        }
    

}
