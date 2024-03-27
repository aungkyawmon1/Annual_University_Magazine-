<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magazine;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CoordinatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
   
    
        public function index(Request $request)
        {
            $departmentId = Auth::user()->department_id;
            $filter = $request->query('filter', 'all');
    
            $magazines = $this->getMagazinesQuery($departmentId, $filter)->get();
            $studentCount = $magazines->groupBy('user_id')->count();
            $contributionCount = $magazines->count();
    
            return view('Coordinator.dashboard', compact('magazines', 'studentCount', 'contributionCount', 'filter'));
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
            $publishDate = $magazine->created_at->format('j F, Y');

            return view('Coordinator.student_detail', [
                'magazine' => $magazine,
                'publishDate' => $publishDate,
            
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
                'user_id' => Auth::id(),
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