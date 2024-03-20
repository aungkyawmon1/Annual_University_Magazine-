<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function loginView() {
        return view('login');
    }

    public function login (Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            if(Auth::user()->role_id == 1) {
                return redirect()->route('magazines')
                    ->withSuccess('You have successfully logged in!');
//                return view('admin.dashboard');
//                return redirect()->route('admin.dashboard')
//                ->withSuccess('You have successfully logged in!');
            }
            else if(Auth::user()->role_id == 2) {
                return redirect()->route('manager/dashboard')
                ->withSuccess('You have successfully logged in!');
            }
            else if(Auth::user()->role_id == 3) {
                return redirect()->route('coordinator/dashboard')
                ->withSuccess('You have successfully logged in!');
            }
            else if(Auth::user()->role_id == 4) {
                return redirect()->route('student-magazines')
                    ->withSuccess('You have successfully logged in!');
//                return view('student-magazines');
//                return redirect()->route('student.dashboard');
//                ->withSuccess('You have successfully logged in!')

            }
            else if(Auth::user()->role_id == 5) {
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
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'role_id' => 5,
            'department_id' => 0
        ]);
        return redirect()->route('login')->with('success','Account has been created successfully.');
    }

    public function logout() {
        dd("logout");
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
