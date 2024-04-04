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
use DB;
use Illuminate\Support\Facades\Auth;
use App\MyClass;
use App\Models\Magazine;


class AdminController extends Controller
{
    public function accountList() {
        $users = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')// joining the contacts table , where user_id and contact_user_id are same
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.*', 'roles.name', 'departments.name')
            ->get();
        //$users = User::all();
        return view('admin.accounts')->with("users", $users);
    }

    public function magazineList() {
        $magazines = DB::table('magazine')
            ->join('users', 'magazine.user_id', '=', 'users.id')
            ->join('departments', 'magazine.department_id', '=', 'departments.id')
            ->select('magazine.user_id', 'magazine.magazine_id','magazine.department_id', 'magazine.title', 'magazine.description', 'magazine.image_url', 'magazine.file_url', 'magazine.created_at', 'departments.name as department_name', 'users.username')
            ->get();

        return view('admin.dashboard')->with("magazines", $magazines);
    }
    public function guestList() {
        $guests = DB::table('users')
            ->select('username', 'created_at', 'updated_at')
            ->where('role_id', 5)
            ->get();
        return view('coordinator.guests')->with("guests", $guests);
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

    public function createMagazine(Request $request) {
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

    public function report() {
        $departmentBy = Magazine::selectRaw('department_id, COUNT(*) as count')
                   ->leftJoin('departments as d', 'department_id', '=', 'd.id')
                   ->groupBy('department_id')
                   ->get();
        //dd($departmentBy);
        $departmentBy1 = Magazine::selectRaw('department_id, COUNT(*) as count')
                   ->leftJoin('departments as d', 'department_id', '=', 'd.id')
                   ->where('is_published', 1)
                   ->groupBy('department_id')
                   ->get();
        //dd($departmentBy1);
                   $objectArray = [];
                   foreach ($departmentBy as $record) {
                    if($record->department_id == 1) {
                        $myClass = new MyClass();
                        $myClass->department_name = "ICT";
                        $myClass->color = "report-color-1";
                        $myClass->department_id = $record->department_id;
                        $myClass->total = $record->count;
                        $idToFind = $record->department_id;
                        $foundObject = collect($departmentBy1)->first(function ($object) use ($idToFind) {
                            return $object->department_id === $idToFind;
                        });
                        if($foundObject != null) {
                            $myClass->published = $foundObject->count;
                        }
                        else{
                            $myClass->published = 0;
                        }
                        $objectsArray[] = $myClass;
                    }
                    else if($record->department_id == 2) {
                        $myClass = new MyClass();
                        $myClass->department_name = "ECE";
                        $myClass->color = "report-color-2";
                        $myClass->department_id = $record->department_id;
                        $myClass->total = $record->count;
                        $idToFind = $record->department_id;
                        $foundObject = collect($departmentBy1)->first(function ($object) use ($idToFind) {
                            return $object->department_id === $idToFind;
                        });
                        if($foundObject != null) {
                            $myClass->published = $foundObject->count;
                        }
                        else{
                            $myClass->published = 0;
                        }
                        $objectsArray[] = $myClass;
                    }
                    else if($record->department_id == 3) {
                        $myClass = new MyClass();
                        $myClass->department_name = "PRE";
                        $myClass->color = "report-color-3";
                        $myClass->department_id = $record->department_id;
                        $myClass->total = $record->count;
                        $idToFind = $record->department_id;
                        $foundObject = collect($departmentBy1)->first(function ($object) use ($idToFind) {
                            return $object->department_id === $idToFind;
                        });
                        if($foundObject != null) {
                            $myClass->published = $foundObject->count;
                        }
                        else{
                            $myClass->published = 0;
                        }
                        $objectsArray[] = $myClass;
                    }
                    else {
                        $myClass = new MyClass();
                        $myClass->department_name = "AME";
                        $myClass->color = "report-color-4";
                        $myClass->department_id = $record->department_id;
                        $myClass->total = $record->count;
                        $idToFind = $record->department_id;
                        $foundObject = collect($departmentBy1)->first(function ($object) use ($idToFind) {
                            return $object->department_id === $idToFind;
                        });
                        if($foundObject != null) {
                            $myClass->published = $foundObject->count;
                        }
                        else{
                            $myClass->published = 0;
                        }
                        $objectsArray[] = $myClass;
                    }
                   }
                
                   $magazines = DB::table('magazine')
                        ->where('is_published', 1)
                        ->join('users', 'magazine.user_id', '=', 'users.id')
                        ->join('departments', 'magazine.department_id', '=', 'departments.id')
                        ->select('magazine.magazine_id as id','magazine.user_id', 'magazine.magazine_id','magazine.department_id', 'magazine.title', 'magazine.description', 'magazine.image_url', 'magazine.file_url', 'magazine.created_at', 'departments.name as department_name', 'users.username')
                        ->get();
                        
        return view("manager.reports")->with('magazines', $magazines)->with('cards', $objectsArray);
    }
}
