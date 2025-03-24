<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function buy(Request $request)
    {
        $user = Auth::user();
        $price = $request->input('price');
        $productName = $request->input('name');

        // Check if user has enough credit
        if ($user->credit >= $price) {
            $user->credit -= $price;
            $user->save();

            return redirect()->back()->with('success', "You successfully bought $productName!");
        }

        return redirect()->back()->with('error', "Not enough credit to buy $productName.");
    }
}
