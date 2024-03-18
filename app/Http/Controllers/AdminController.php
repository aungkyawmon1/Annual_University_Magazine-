<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use App\Models\AcademicYear;
use App\Models\AnnualEvent;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function accountList() {
        $users = User::all();
        return view('admin.accounts')->with("users", $users);
    }

    public function createAccountForm() {
//        if (!Auth::check()) {
        if (false) { // fix later
            return redirect("login")->withSuccess('You are not allowed to access');
        }
        $roles = Role::all();
        $departments = Department::all();
        return view('admin.account_create')->with("roles", $roles, "departments", $departments);
    }

    public function createAccount(Request $request) {
        if (false) { // fix later
//        if (!Auth::check()) {
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
//        $request->password = Hash::make($request->password);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'role_id' => $request->role_id,
            'department_id' => $request->department_id
        ]);
        return redirect()->route('accounts')->with('success','Account has been created successfully.');
    }


    public function eventList() {
        $events = AnnualEvent::all();
        return view('admin.events')->with("events", $events);
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
            'academic_year' => 'required',
            'closure_date' => 'required'
        ]);
        AnnualEvent::create([
            'title' => $request->title,
            'academic_year' => $request->academic_year,
            'closure_date' => $request->closure_date
        ]);
        return redirect()->route('admin/events')->with('success','Magazine Event has been created successfully.');
    }

    public function editMagazineForm($id) {
        if (!Auth::check()) {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
        $event = AnnualEvent::find($id);
        return view('admin.edit_event')->with("event", $event);
    }

    public function editMagazine(Request $request) {
        if (!Auth::check()) {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
        AnnualEvent::where("id", $request->id)->first()->update(array('title'=>$request->title, 'academic_year'=>$request->academic_year, 'closure_date'=>$request->closure_date));
        return redirect()->route('events')->with('success', 'Magazine event updated successfully');
    }
}
