<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthCountroller extends Controller
{
    //register
    public function register(Request $request)
    {
        if ($request->isMethod("post")) {
            $request->validate([
                "name" => "required|string",
                "email" => "required|email|unique:users",
                "role" => "required",
                "password" => "required"
            ]);
            User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "role" => $request->role
            ]);
            if (Auth::attempt([
                "email" => $request->email,
                "password" => $request->password
            ])) {

                return to_route('dashboard');
            } else {

                return to_route('resgiter');
            }
        }

        return view("auth.register");
    }
    //register
    public function login(Request $request)
    {
        if ($request->isMethod("post")) {

            $request->validate([
                "email" => "required|email",
                "password" => "required"
            ]);

            if (Auth::attempt([
                "email" => $request->email,
                "password" => $request->password
            ])) {

                return to_route("dashboard");
            } else {

                return to_route("login")->with("error", "Invalid login details");
            }
        }
        return view("auth.login");
    }
    //register
    public function dashboard()
    {
        return view("dashboard");
    }
    //register
    public function profile(Request $request)
    {
        if ($request->isMethod("post")) {

            $request->validate([
                "name" => "required|string",
                "role" => "required"
            ]);

            $id = auth()->user()->id; // Logged In userID

            $user = User::findOrFail($id);

            $user->name = $request->name;
            $user->role = $request->role;
            $user->save();

            return to_route("profile")->with("success", "Successfully, profile updated");
        }
        return view("profile");
    }
    //register
    public function logout()
    {
        Session::flush();

        Auth::logout();

        return to_route("login")->with("success", "Logged out successfully");
    }
}
