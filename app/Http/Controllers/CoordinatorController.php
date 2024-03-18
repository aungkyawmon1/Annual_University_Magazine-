<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magazine;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CoordinatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    
    public function showUnpublished()
    {
        $departmentId = Auth::user()->department_id; 
        $unpublishedMagazines = Magazine::where('published', false)
                                        ->where('department_id', $departmentId)
                                        ->get();
        return view('coordinator.contributions', compact('unpublishedMagazines'));
    }


    public function publish($id)
    {
        $magazine = Magazine::where('id', $id)
                            ->where('department_id', Auth::user()->department_id)
                            ->firstOrFail();
        $magazine->published = true;
        $magazine->save();
        return back()->with('success', 'Magazine published successfully.');
    }

    public function showDetail($studentId)
    {
        $contributions = Magazine::where('student_id', $studentId)
                                 ->where('department_id', Auth::user()->department_id)
                                 ->get();
        return view('coordinator.studentdetail', compact('contributions'));
    }


    public function postComment(Request $request, $magazineId)
{
    $request->validate([
        'comment' => 'required|string|max:255',
    ]);

    $comment = new Comment();
    $comment->user_id = Auth::id();
    $comment->magazine_id = $magazineId;
    $comment->comment = $request->input('comment');
    $comment->save();
    return back()->with('success', 'Your comment has been posted.');
}

}
