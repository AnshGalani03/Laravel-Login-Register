<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login_view()
    {
        return view('auth.login');
    }

    function login(Request $request)
    {
        // $request->validate([
        //     'login' => 'rquired',
        //     'password' => 'rquired',
        // ]);

        $login = $request->input('login');
        $password = $request->input('password');
        // Determine if the login input is an email, username, or phone number
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $credentials = ['email' => $login, 'password' => $password];
        } elseif (is_numeric($login)) {
            $credentials = ['phone_no' => $login, 'password' => $password];
        } else {
            $credentials = ['username' => $login, 'password' => $password];
        }

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard')->with('success', 'Welcome');
        } else {
            return redirect()->back()->withInput()->withErrors(['login' => 'Login failed. Please check your credentials and try again.']);
        }
    }

    function register_view()
    {
        return view('auth.register');
    }

    function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'firstname' => 'required|max:255',
            'email' => 'required|unique:users,email|max:255',
            'username' => 'required|unique:users,username|max:255',
            'password' => 'required|confirmed|min:6|max:255',
            'password_confirmation' => 'required|min:6|max:255',
            'phoneno' => 'required|unique:users,phone_no|min:10|max:255',
            'dob' => 'required|date|before:-18 years',
            'gender' => 'required',
            'hobbies' => 'required|array|min:3|max:5',
            'hobbies*' => 'required|string|max:255',
        ]);

        $user = new users();
        $user->fname = $request->firstname;
        $user->lname = $request->lastname;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->phone_no = $request->phoneno;
        $user->dob = $request->dob;
        $user->college_name = $request->collegeName;
        $user->education = $request->education;
        $user->gender = $request->gender;
        $user->hobbies = json_encode($request->hobbies);

        $user_save = $user->save();

        if ($user_save) {
            return back()->with('success', 'Register Successfully');
        } else {
            return back()->withErrors('Error saving the registration data. Please try again.');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
