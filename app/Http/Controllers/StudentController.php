<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use App\Models\AcademicYear;
use App\Models\AnnualEvent;
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
}
