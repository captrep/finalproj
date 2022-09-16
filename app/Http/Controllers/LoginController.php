<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function show()
   {
    return redirect()->back()->with('success', 'Created successfully!');
   }
}
