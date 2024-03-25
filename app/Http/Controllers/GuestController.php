<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function publishedList() {
        $user_id = auth()->user()->id;
        $department_id = auth()->user()->department_id;
        $magazines = DB::table('magazines')
            ->where('magazines.department_id', $department_id)
            ->join('departments', 'magazines.department_id', '=', 'departments.id')
            ->join('users', 'magazines.user_id', '=', 'users.id')
            ->where('is_published', true)
            ->select('magazines.user_id', 'magazines.department_id', 'magazines.title', 'magazines.description', 'magazines.image_url', 'magazines.file_url', 'magazines.created_at', 'departments.name as department_name', 'users.username')
            ->get();

        return view('guest.dashboard')->with("magazines", $magazines);
    }
}
