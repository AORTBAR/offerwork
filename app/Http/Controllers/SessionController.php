<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    //
    public function create()
    {
        return view('auth.login');
    }


        
    public function store(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $user = User::where('email', $credentials['email'])->first();

    if (!$user || !Hash::check($credentials['password'], $user->password)) {
        return back()->withErrors(['email' => 'Las credenciales proporcionadas no son válidas.']);
    }

    Auth::login($user);
    if ($user->isAdmin()) {
        return redirect()->route('admin.index');
    } elseif ($user->isUser()) {
        return redirect()->route('empleados.index');
        // Redirecciona a la ruta correspondiente para los empleados
    } 
   
}


    public function destroy()
    {

        auth()->logout();

        return redirect()->to('/');
    }
}
