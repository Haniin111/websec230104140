<?php

// app/Http/Controllers/StudentProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\Auth;

class StudentProfileController extends Controller
{
    public function create()
    {
        return view('student_profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'major' => 'required|string',
        ]);

        StudentProfile::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'age' => $request->age,
            'major' => $request->major,
        ]);

        return redirect()->route('student_profiles.index');
    }

    public function index()
    {
        $profiles = StudentProfile::all();
        return view('student_profiles.index', compact('profiles'));
    }
}

