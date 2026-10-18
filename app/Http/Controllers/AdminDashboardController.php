<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display the administrator dashboard.
     */
    public function index()
    {
        $totalOrganizations = Organization::count();

        $totalUsers = User::count();

        $totalStudents = User::where('role', 'student')->count();

        $totalAdmins = User::where('role', 'admin')->count();

        $recentOrganizations = Organization::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalOrganizations',
            'totalUsers',
            'totalStudents',
            'totalAdmins',
            'recentOrganizations'
        ));
    }
}
