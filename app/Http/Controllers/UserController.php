<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // ميدخلش غير لو مسجل دخول
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addBalance(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1'
        ]);

        $user = Auth::user();
        $user->balance += $request->amount;
        $user->save();

        return back()->with('status', '✅ Balance added successfully!');
    }
}
