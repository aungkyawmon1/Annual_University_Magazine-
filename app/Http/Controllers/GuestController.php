<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GuestController extends Controller
{
    public function publishedList($department_id) {
        $user_id = auth()->user()->id;
        //$department_id = auth()->user()->department_id;
        $magazine = DB::table('magazine')
            ->where('magazine.department_id', $department_id)
            ->join('departments', 'magazine.department_id', '=', 'departments.id')
            ->join('users', 'magazine.user_id', '=', 'users.id')
            ->where('is_published', true)
            ->select('magazine.magazine_id','magazine.user_id', 'magazine.department_id', 'magazine.title', 'magazine.description', 'magazine.image_url', 'magazine.file_url', 'magazine.created_at', 'departments.name as department_name', 'users.username')
            ->get();


        /*$magazine = DB::table('magazine')
            ->where('magazine.department_id', $department_id)
            ->join('departments', 'magazine.department_id', '=', 'departments.id')
            ->join('users', 'magazine.user_id', '=', 'users.id')
            ->where('is_published', true)
            ->select('id', 'magazine.user_id', 'magazine.department_id', 'magazine.title', 'magazine.description', 'magazine.image_url', 'magazine.file_url', 'magazine.created_at', 'departments.name as department_name', 'users.username')
            ->get();*/

        return view('guest.dashboard')->with("magazine", $magazine);
    }

    public function preview($id) {
        $magazine = DB::table('magazine')
            ->where('magazine.magazine_id', $id)
            ->select('*')
            ->get()->first();
        return view('student.preview-pdf')->with('magazine', $magazine);
    }
}
