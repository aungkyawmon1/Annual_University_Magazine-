<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use App\Models\AcademicYear;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function createAccountForm() {
        if (!Auth::check()) {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
        $roles = Role::all();
        $departments = Department::all();
        return view('admin.create_account')->with("roles", $roles, "departments", $departments);
    }

    public function createAccount(Request $request) {
        if (!Auth::check()) {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
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
            'roleId' => $request->roleId,
            'departmentId' => $request->departmentId
        ]);
        return redirect()->route('admin/accounts')->with('success','Account has been created successfully.');
    }

    public function createMagazineForm() {
        if (!Auth::check()) {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
        return view("admin.create_event");
    }
    public function createMagazine(Request $reques) {
        if (!Auth::check()) {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
        $request->validate([
            'title' => 'required',
            'academicYear' => 'required',
            'closureDate' => 'required'
        ]);
        AcademicYear::create([
            'title' => $request->title,
            'academicYear' => $request->academicYear,
            'closureDate' => $request->closureDate
        ]);
        return redirect()->route('admin/events')->with('success','Magazine Event has been created successfully.');
    }
}
