<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthController;
use App\Models\KategoriUmkm;
use Illuminate\Support\Facades\Auth; 
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('admin/page/settings/list', compact('user'));
    }

    public function _update_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->input('id'),
            'jenis_kelamin' => 'required|string',
            'no_telp' => 'required|string|max:15',
            'id_provinsi' => 'required|integer',
            'id_kabkota' => 'required|integer',
            'password' => 'nullable|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('settings')->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($request->input('id'));

        if ($request->hasFile('image')) {
            if ($user->image && file_exists(public_path('images/' . $user->image))) {
                unlink(public_path('images/' . $user->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = $user->image;
        }

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'no_telp' => $request->input('no_telp'),
            'id_provinsi' => $request->input('id_provinsi'),
            'id_kabkota' => $request->input('id_kabkota'),
            'image' => $imageName,
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->input('password')),
            ]);
        }

        return redirect()->route('settings')->with('success', 'Data pengguna berhasil diperbarui');
    }

}
