<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function viewLogin() {
        return view('login');
    }

    public function Login (Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            if(Auth::user()->roleId == 1) {
                return redirect()->route('admin/dashboard')
                ->withSuccess('You have successfully logged in!');
            }
            else if(Auth::user()->roleId == 2) {
                return redirect()->route('manager/dashboard')
                ->withSuccess('You have successfully logged in!');
            }
            else if(Auth::user()->roleId == 3) {
                return redirect()->route('coordinator/dashboard')
                ->withSuccess('You have successfully logged in!');
            }
            else if(Auth::user()->roleId == 4) {
                return redirect()->route('student/dashboard')
                ->withSuccess('You have successfully logged in!');
            }
            else if(Auth::user()->roleId == 5) {
                return redirect()->route('guest/dashboard')
                ->withSuccess('You have successfully logged in!');
            }
        }
        return back()->withErrors([
            'error' => 'Your provided credentials do not match in our records.',
        ]);
    }

    public function registerView() {
        return view('register');
    }

    public function register (Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required'
        ]);

        $user = User::select('username')->where('email', $request->email)->first();
        
        if($user != null) {
            return back()->withErrors([
                'error' => 'Email already exist.',
            ]);
        }
        $request->password = Hash::make($request->password);
        
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'contactNumber' => $request->contactNumber,
            'address' => $request->address,
            'dateOfBirth' => $request->dateOfBirth,
            'gender' => $request->gender,
            'roleId' => 5,
            'departmentId' => 0
        ]);
        return redirect()->route('login')->with('success','Account has been created successfully.');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
