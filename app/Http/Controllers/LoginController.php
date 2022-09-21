<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function show()
   {
    return view('auth.login');
   }

   public function store(Request $request)
   {
      $attr = $request->validate([
         'username' => ['required', 'alphanum'],
         'password' => ['required'],
     ]);
     
     if (Auth::attempt($attr)) {
         return redirect('dashboard');
     }

     throw ValidationException::withMessages([
      'username' => 'username gaada',
      'password' => 'salah',
      ]);
      
   }
}
