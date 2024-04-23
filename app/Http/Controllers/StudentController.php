<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use App\Models\AcademicYear;
use App\Models\AnnualEvent;
use DB;
use App\Models\Magazine;
use App\Mail\PushMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function uploadMagazine (Request $request) {
        $file = $request->file('img_file');
        $file1 = $request->file('doc_file');
        $user_id = auth()->user()->id;
        $department_id = auth()->user()->department_id;
        $filename = $file->getClientOriginalName();
        $filename1 = $file1->getClientOriginalName();
        $file->storeAs('public/uploads', $filename);
        $file->storeAs('public/uploads', $filename1);
        $title = 'Welcome to University Magazine';
        $body = 'Please check your account. you have new contribution in your department!';

        $coordinator = DB::table('users')
            ->select('*')
            ->where('department_id', $department_id)
            ->where('role_id', 3)
            //->where('password', Hash::make($request->password))
            ->get()->first;
            //dd($coordinator);
        Magazine::create([
            'title' => $request->title,
            'user_id' => $user_id,
            'department_id' => $department_id,
            'academic_year_id' => 1,
            'file_url' => $filename1,
            'image_url' => $filename
        ]);
        Mail::to($coordinator->email)->send(new PushMail($title, $body));
        return back()->withErrors([
            'success' => 'Your article have successfully uploaded.',
        ]);
    }

    public function updateMagazine (Request $request) {
        $file = $request->file('img_file');
        $file1 = $request->file('doc_file');
        $user_id = auth()->user()->id;
        $department_id = auth()->user()->department_id;
        $filename = $file->getClientOriginalName();
        $filename1 = $file1->getClientOriginalName();
        $file->storeAs('public/uploads', $filename);
        $file->storeAs('public/uploads', $filename1);
        $title = 'Welcome to University Magazine';
        $body = 'Please check your account. you have new contribution in your department!';

        $coordinator = DB::table('users')
            ->select('*')
            ->where('department_id', $department_id)
            ->where('role_id', 3)
            //->where('password', Hash::make($request->password))
            ->get()->first;
            //dd($coordinator);

        //User::where("id", $request->id)->first()->update(array('username'=>$request->username, 'phone_no'=>$request->phone_no, 'address'=>$request->address));
        Magazine::where("id", $request->id)->first()->update(array('title'=>$request->title, 'file_url'=> $filename1, 'image_url'=>$filename));
        //Mail::to($coordinator->email)->send(new PushMail($title, $body));
        return back()->withErrors([
            'success' => 'Your article have successfully updated.',
        ]);
    }

    public function download($filename) {
        $name = $filename;
        $file = $file = public_path('storage/uploads/'.$filename);
        $mimeType = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
        $header = array(
         'Content-Type' => $mimeType,
         'Content-Disposition' => 'attachment',
         'Content-lenght' => filesize($file),
         'filename' => $name,
        );

     // auth code
     return Response::download($file, $name, $header);
    }

    // public function getMagazinesByUserId($userId=1) {
    //     $currentAcademicYear = AcademicYear::where('status', 'ACTIVE')->first();
    //     $userId = Auth::user()->id;
    //     $departmentName = DB::table('departments as d')
    //         ->join('users as u', 'u.department_id', '=', 'd.id')
    //         ->select('d.name')
    //         ->where('u.id', $userId)
    //         ->first();
    //     $magazines = Magazine::query()
    //         ->select(
    //             'magazine.user_id',
    //             'magazine.magazine_id',
    //             'magazine.department_id',
    //             'magazine.title',
    //             'magazine.description',
    //             'magazine.image_url',
    //             'magazine.file_url',
    //             'magazine.created_at',
    //             'departments.name AS department_name',
    //             'users.username',
    //             \DB::raw('COUNT(comments.comment_id) as comment_count')
    //         )
    //         ->join('users', 'magazine.user_id', '=', 'users.id')
    //         ->join('departments', 'magazine.department_id', '=', 'departments.id')
    //         ->leftJoin('comments', function ($join) {
    //             $join->on('magazine.magazine_id', '=', 'comments.magazine_id')
    //                 ->where('comments.status', 1);
    //         })
    //         ->where('users.id', $userId)
    //         ->groupBy(
    //             'magazine.user_id',
    //             'magazine.magazine_id',
    //             'magazine.department_id',
    //             'magazine.title',
    //             'magazine.description',
    //             'magazine.image_url',
    //             'magazine.file_url',
    //             'magazine.created_at',
    //             'departments.name',
    //             'users.username'
    //         )
    //         ->get();
    //     return view('student.dashboard',[
    //         'magazines' => $magazines,
    //         'currentAcademicYear' => $currentAcademicYear,
    //         'departmentName' => $departmentName,
    //     ]);
    // }

    public function getMagazinesByUserId() {
        $currentAcademicYear = AcademicYear::where('status', 'ACTIVE')->first();
        $userId = Auth::user()->id;
        $departmentName = DB::table('departments as d')
            ->join('users as u', 'u.department_id', '=', 'd.id')
            ->select('d.name')
            ->where('u.id', $userId)
            ->first();

        $magazines = Magazine::with(['comments.user' => function ($query) {
                                $query->where('role_id', 3); // Filter to only include coordinator's comments
                             }])
                             ->where('user_id', $userId)
                             ->get();


        return view('student.dashboard', [
            'magazines' => $magazines,
            'currentAcademicYear' => $currentAcademicYear,
            'departmentName' => $departmentName,
        ]);
    }


    public function preview($id) {
        $magazine = DB::table('magazine')
            ->where('magazine.magazine_id', $id)
            ->select('*')
            ->get()->first();
            //dd($magazine);
        return view('student.preview-pdf')->with('magazine', $magazine);
    }
}
