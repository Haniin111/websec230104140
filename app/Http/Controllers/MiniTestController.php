<?php

// app/Http/Controllers/MiniTestController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiniTestController extends Controller
{
    public function show()
    {
        $bill = [
            ['name' => 'Bread', 'quantity' => 2, 'price' => 10],
            ['name' => 'Milk', 'quantity' => 1, 'price' => 15],
            ['name' => 'Eggs', 'quantity' => 12, 'price' => 1.25],
        ];

        return view('minitest', compact('bill'));
    }
}

