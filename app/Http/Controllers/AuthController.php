<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        return view('Register');
    }

    public function login(Request $request) {
        // Langkah 1: Validasi Input
        $request->validate([
            'Full name' => 'required|name', 
            'Email address' => 'required|email',
            'Create password' => 'required',
            'Repeat password' => 'required',   
        ]);
        
        
        $credentials = $request->only('email', 'password'); 
    
        if (Auth::attempt($credentials)) {
        
            $id = Auth::user()->id;
            $currentUser = User::find($id);

            if ($currentUser->role_id == 1) {
           
                return redirect()->intended('/login');
            } else {
                
                return redirect()->intended('/home');
            }
        } else {
 
            return back()->withErrors(['error' => 'Invalid credentials'])->withInput();
        }
    }
}
