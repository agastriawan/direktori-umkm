<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function daftar()
    {
        return view('daftar');
    }

    public function _role()
    {
        $role = Role::all();
        return response()->json($role);
    }

    public function _register(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password_confirmation' => 'required',
            'password' => [
                'required',
                'min:8',
                'confirmed',
            ],
            'no_telp' => 'required|string|max:15',
            'jenis_kelamin' => 'required',
            'id_provinsi' => 'required',
            'id_kabkota' => 'required',
            'id_role' => 'required|integer',
        ]); 
    
        if ($validator->fails()) {
            return redirect()->route('daftar')->withErrors($validator)->withInput();
        }
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telp' => $request->no_telp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_provinsi' => $request->id_provinsi,
            'id_kabkota' => $request->id_kabkota,
            'id_role' => $request->id_role,
        ]);
    
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
    
    public function _login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('login')->with('error', 'Email atau Password Tidak Sesuai');
        }

        return redirect()->route('dashboard')->with('success', 'Login successful.');
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function getProvinsi()
    {
        $provinces = Provinsi::all();
        return response()->json($provinces);
    }

    public function getKota($provinceId)
    {
        $kota = Kota::where('provinsi_id', $provinceId)->get();
        return response()->json($kota);
    }

    public function _kota()
    {
        $data = Kota::all();
        return response()->json($data);
    }

    public function _logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('login')->with('message', 'Logout berhasil.');
    }    
    
}
