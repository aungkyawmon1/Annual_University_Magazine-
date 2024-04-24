<?php

namespace App\Http\Controllers;

use DB;
use ZipArchive;
use App\MyClass;
use Carbon\Carbon;
use App\Models\Magazine;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ManagerController extends Controller
{

    public function getMagazinesByManager() {
        $currentAcademicYear = AcademicYear::where('status', 'ACTIVE')->first();
        $magazines = DB::table('magazine as m')
            ->join('departments as d', 'm.department_id', '=', 'd.id')
            ->join('users as u', 'm.user_id', '=', 'u.id')
            ->select('m.*', 'd.name as department_name', 'u.username')
            ->where('m.status', 1)
            ->get();
        return view('manager.dashboard', [
            'magazines' => $magazines,
            'currentAcademicYear' => $currentAcademicYear,
        ]);
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
        $currentAcademicYear = AcademicYear::where('status', 'ACTIVE')->first();
        $userId = Auth::user()->id;
        $departmentName = DB::table('departments as d')
            ->join('users as u', 'u.department_id', '=', 'd.id')
            ->select('d.name')
            ->where('u.id', $userId)
            ->first();
        return view('manager.reports', [
            'magazines' => $magazines,
            'cards' => $objectsArray,
            'currentAcademicYear' => $currentAcademicYear,
            'departmentName' => $departmentName

        ]);
    }


    public function downloadFinalSubmissions(Request $request){
        $currentAcademicYear = AcademicYear::where('status', 'ACTIVE')->first();
        if (Carbon::now()->lessThan(new Carbon($currentAcademicYear->final_closure_date))) {
            return back()->withErrors(['error' => 'The final closure date has not passed yet.']);
        }
        $submissions = Magazine::where('academic_year_id', $currentAcademicYear->id)->get();
        $zipFileName = 'final-submissions-' . $currentAcademicYear->academic_year . '.zip';
        $zipPath = storage_path('app/public/' . $zipFileName);
        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {

            foreach ($submissions as $submission) {
                $documentPath = storage_path('app/public/uploads/' . $submission->file_url);
                $imagePath = storage_path('app/public/uploads/' . $submission->image_url);
                //
                if (file_exists($documentPath)) {
                    $zip->addFile($documentPath, 'documents/' . basename($documentPath));
                }
                if (file_exists($imagePath)) {
                    $zip->addFile($imagePath, 'images/' . basename($imagePath));
                }
            }
            $zip->close();
            return response()->download($zipPath)->deleteFileAfterSend(false);
        } else {
            return back()->withErrors(['error' => 'Could not create the ZIP file.']);
        }
    }
}

