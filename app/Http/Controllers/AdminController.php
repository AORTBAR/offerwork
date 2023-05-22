<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Empresa;
use App\Models\Oferta;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{



    public function index()
    {
        // Llamamos al método que obtiene los datos de la API
        $weatherData = $this->getWeatherData();

        return view('adminIndex', compact('weatherData'));
    }

    public function getWeatherData()
    {
        $city = 'Sevilla';
        $apiKey = 'cf5e1ef513b5bc3056034a762771b17a';
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey";

        $data = json_decode(file_get_contents($apiUrl), true);

        return $data;
    }



    public function showUsers()
    {
        $users = User::paginate(10);
        return view('userindex', compact('users'));
    }

    public function create()
    {
        $users = User::all();
        return view('usercreate', compact('users'));
    }

    public function deleteUsers(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
    
        return redirect()->back()->with('success', 'Usuario eliminado exitosamente.');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return back()->withErrors(['No se pudo encontrar el usuario especificado.']);
        }
    
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
    
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }


}
