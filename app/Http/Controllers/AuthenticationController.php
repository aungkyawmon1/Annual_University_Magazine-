<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use DB;

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
                return view('coordinator.dashboard');
//                return redirect()->route('coordinator.dashboard')
//                ->withSuccess('You have successfully logged in!');
            }
            else if(Auth::user()->role_id == 4) {
                return redirect()->route('student-magazines')
                    ->withSuccess('You have successfully logged in!');
//                return view('student-magazines');
//                return redirect()->route('student.dashboard');
//                ->withSuccess('You have successfully logged in!')

            }
            else if(Auth::user()->role_id == 5) {
                return redirect()->route('guests');
//                return redirect()->route('guest/dashboard')
//                ->withSuccess('You have successfully logged in!');
            }
        }

        return back()->withErrors([
            'error' => 'Your provided credentials do not match in our records.',
        ]);
    }

    public function registerView() {
        return view('guest.register');
    }
    public function guestLoginView() {
        return view('guest.login');
    }
    public function register (Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        //$user = User::select('username')->where('email', $request->email)->first();

        /*if($user != null) {
            return back()->withErrors([
                'error' => 'Email already exist.',
            ]);
        }*/

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => " ",
            'contact_number' => " ",
            'address' => " ",
            'role_id' => 5,
            'department_id' => $request->department_id
        ]);
        return redirect()->route('guestLogin')->with('success','Account has been created successfully.');
    }

    public function guestLogin (Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
    
        if(Auth::attempt($credentials))
        {
            $department_id = $request->department_id;
            
            $guests = DB::table('users')
            ->select('*')
            ->where('department_id', $department_id)
            ->where('username', $request->username)
            //->where('password', Hash::make($request->password))
            ->get();
            if($guests) {
                $magazines = DB::table('magazines')
            ->where('magazines.department_id', $department_id)
            ->join('departments', 'magazines.department_id', '=', 'departments.id')
            ->join('users', 'magazines.user_id', '=', 'users.id')
            ->where('is_published', true)
            ->select('magazines.id','magazines.user_id', 'magazines.department_id', 'magazines.title', 'magazines.description', 'magazines.image_url', 'magazines.file_url', 'magazines.created_at', 'departments.name as department_name', 'users.username')
            ->get();
            $request->session()->regenerate();
            return view('guest.index')->with("magazines", $magazines);
            /*return redirect()->route('publish')
                    ->withSuccess('You have successfully logged in!');
//                return view('admin.dashboard');*/
//                return redirect()->route('admin.dashboard')
//                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'error' => 'Your provided credentials do not match in our records.',
        ]);
    }
    }
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }

    public function guestLogout() {
        Session::flush();
        Auth::logout();
        return Redirect('guestLogin');
    }
}
