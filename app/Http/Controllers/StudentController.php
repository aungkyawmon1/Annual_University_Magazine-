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

class StudentController extends Controller
{
    public function uploadMagazine (Request $request) {
        $file = $request->file('img_file');
        $file1 = $request->file('doc_file');
        $user_id = auth()->user()->id;
        $department_id = auth()->user()->id;
        $filename = $file->getClientOriginalName();
        $filename1 = $file1->getClientOriginalName();
        $file->storeAs('public/uploads', $filename);
        $file->storeAs('public/uploads', $filename1);
        Magazine::create([
            'title' => $request->title,
            'user_id' => $user_id,
            'department_id' => $department_id,
            'academic_year_id' => 1,
            'file_url' => $filename1,
            'image_url' => $filename
        ]);
        return back()->withErrors([
            'error' => 'Your article have successfully uploaded.',
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

    public function getMagazinesByUserId($userId=1) {
        $magazines = DB::table('magazine as m')
            ->join('users as u', 'm.user_id', '=', 'u.id')
            ->join('departments as d', 'm.department_id', '=', 'd.id')
            ->leftJoin('comment as c', 'm.magazine_id', '=', 'c.magazine_id')
            ->where('u.id', $userId)
            ->where('c.status', 1)
            ->select('m.user_id', 'm.department_id', 'm.title', 'm.description', 'm.image_url', 'm.file_url', 'm.created_at', 'd.name as department_name', 'u.username', 'd.name', DB::raw('COUNT(c.comment_id) as comment_count'))
            ->groupBy('m.user_id', 'm.department_id', 'm.title', 'm.description', 'm.image_url', 'm.file_url', 'm.created_at', 'd.name', 'u.username', 'd.name')
            ->get();
        return view('student.dashboard')->with("magazines", $magazines);
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
