<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected function redirectTo()
    {
        if (Auth::user()->user_type == 'Administrator') {
            return 'admin';  // admin dashboard path
        } else {
            return 'home';  // member dashboard path
        }
    }
   public function register(){
    return view('register');
   }
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);
        // hashed password saved to db
        $formFields['password'] = bcrypt($formFields['password']);
        //create user in db
        $user = User::create($formFields);
        auth()->login($user);

        return redirect('/')->with('message', 'User Created and logged in');
        
    }
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }
    public function login()
    {
        return view('login');
    }


    //authenticate
    public function authenticate(Request $request)
    {

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
       
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            $orders = DB::table('orders')->get();

            foreach ($orders as $order) {
                var_dump($order->name);
            }
            if (Auth::user()->user_type == 'Administrator') {
             
                return view('admin');  // admin dashboard path
            } else {
                return redirect('/')->with('message', 'You are now logged in!');
            }
           
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
   
}