<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function dashboard() {
        return view("manager.dashboard");
    }
    
    public function report() {
        $departmentBy = Magazine::selectRaw('department_id, COUNT(*) as count')
                   ->join('departments as d', 'department_id', '=', 'd.id')
                   ->groupBy('department_id')
                   ->get();
        $departmentBy1 = Magazine::selectRaw('department_id, COUNT(*) as count')
                   ->join('departments as d', 'department_id', '=', 'd.id')
                   ->where('is_published', 1)
                   ->groupBy('department_id')
                   ->get();
                   $magazines = DB::table('magazine')
                        ->where('is_published', 1)
                        ->join('users', 'magazine.user_id', '=', 'users.id')
                        ->join('departments', 'magazine.department_id', '=', 'departments.id')
                        ->select('magazine.magazine_id as id','magazine.user_id', 'magazine.magazine_id','magazine.department_id', 'magazine.title', 'magazine.description', 'magazine.image_url', 'magazine.file_url', 'magazine.created_at', 'departments.name as department_name', 'users.username')
                        ->get();
        return view("manager.reports")->with('magazines', $magazines);
    }
}
