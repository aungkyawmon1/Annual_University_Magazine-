<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Magazine;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class CoordinatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $departmentId = Auth::user()->department_id;
        $userId = Auth::user()->id;
        $departmentName = DB::table('departments as d')
            ->join('users as u', 'u.department_id', '=', 'd.id')
            ->select('d.name')
            ->where('u.id', $userId)
            ->first();
        $filter = $request->query('filter','all');

        $magazines = $this->getMagazinesQuery($departmentId, $filter)->get();
        $studentCount = $magazines->groupBy('user_id')->count();
        $contributionCount = $magazines->count();

        $currentAcademicYear = AcademicYear::where('status', 'ACTIVE')->first();
        $closureDate = $currentAcademicYear ? $currentAcademicYear->closure_date : null;

        return view('Coordinator.dashboard', compact('magazines', 'studentCount', 'contributionCount', 'filter','closureDate', 'currentAcademicYear','departmentName'));
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
        $magazine = Magazine::where('magazine_id', $id)
            ->where('department_id', Auth::user()->department_id)
            ->firstOrFail();
        $magazine->is_published = 1;
        $magazine->save();
        return back()->with('success', 'Magazine published successfully.');
    }

    public function publishMagazine($id)
    {
        $magazine = $this->findMagazine($id);
        $magazine->update(['published' => true]);

        return back()->with('success', 'Magazine published successfully.');
    }
    public function showDetail($magazineId)
    {
        $magazine = Magazine::with('user')->findOrFail($magazineId);
        $userId = Auth::user()->id;
        $publishDate = $magazine->created_at->format('j F, Y');
        $currentAcademicYear = AcademicYear::where('status', 'ACTIVE')->first();
        $closureDate = $currentAcademicYear ? $currentAcademicYear->closure_date : null;
        $comments = DB::table('comments as c')
            ->join('users as u', 'u.id', '=', 'c.user_id')
            ->select(
                'c.*',
                'u.username',
                DB::raw("CASE
            WHEN TIMESTAMPDIFF(MINUTE, c.created_at, NOW()) < 60 THEN CONCAT(TIMESTAMPDIFF(MINUTE, c.created_at, NOW()), ' minutes ago')
            WHEN TIMESTAMPDIFF(HOUR, c.created_at, NOW()) < 24 THEN CONCAT(TIMESTAMPDIFF(HOUR, c.created_at, NOW()), ' hours ago')
            WHEN TIMESTAMPDIFF(DAY, c.created_at, NOW()) < 30 THEN CONCAT(TIMESTAMPDIFF(DAY, c.created_at, NOW()), ' days ago')
            ELSE CONCAT(TIMESTAMPDIFF(MONTH, c.created_at, NOW()), ' months ago')
        END AS time_ago")
            )
            ->where('c.magazine_id', $magazine->magazine_id)
            ->get();
        $departmentName = DB::table('departments as d')
            ->join('users as u', 'u.department_id', '=', 'd.id')
            ->select('d.name')
            ->where('u.id', $userId)
            ->first();
        return view('Coordinator.student_detail', [
            'magazine' => $magazine,
            'publishDate' => $publishDate,
            'currentAcademicYear' => $currentAcademicYear,
            'departmentName' => $departmentName,
            'comments' => $comments

        ]);
    }
    public function previewMagazine($magazineId)
    {
        $magazine = Magazine::with('user')->findOrFail($magazineId);

        return view('Coordinator.preview', compact('magazine'));
    }

    public function postComment(Request $request, $magazineId)
    {
        $request->validate(['comment' => 'required|string|max:255']);

        Comment::create([
            'user_id' => Auth::user()->id,
            'magazine_id' => $magazineId,
            'comment' => $request->input('comment')
        ]);

        return back()->with('success', 'Your comment has been posted.');
    }

    private function getMagazinesQuery($departmentId, $filter)
    {
        $query = Magazine::where('department_id', $departmentId)->with('user');

        if ($filter === 'published') {
            $query->where('is_published', true);
        } elseif ($filter === 'unpublished') {
            $query->where('is_published', false);
        }

        return $query;
    }
    private function findMagazine($id)
    {
        return Magazine::where('id', $id)->where('department_id', Auth::user()->department_id)->firstOrFail();
    }
    private function getStudentContributions($studentId)
    {
        return Magazine::where('student_id', $studentId)->where('department_id', Auth::user()->department_id)->get();
    }
}
