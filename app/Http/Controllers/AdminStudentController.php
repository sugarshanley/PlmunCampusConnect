<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminStudentController extends Controller
{
    /**
     * Display and search student accounts.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));

        $students = User::query()
            ->where('role', 'student')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere(
                            'student_number',
                            'like',
                            "%{$search}%"
                        );
                });
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        $totalStudents = User::where('role', 'student')->count();

        return view('admin.students.index', compact(
            'students',
            'search',
            'totalStudents'
        ));
    }
}
