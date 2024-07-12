<?php

namespace App\Http\Controllers;

use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin/page/role/list');
    }

    public function _list_role(Request $request)
    {
        $role = Role::all();

        $data = [
            "data" => $role
        ];

        return response()->json($data);
    }

    public function _post_role(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('role')->withErrors($validator)->withInput();
        }

        $role = new Role([
            'role' => $request->input('role'),
        ]);

        $role->save();

        return redirect()->route('role')->with('success', 'Data role berhasil disimpan');
    }

    public function _delete(string $id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->delete();

            return response()->json([
                'message' => 'Data berhasil dihapus.'
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return response()->json([
                    'message' => 'Data gagal dihapus karena ID role ini masih digunakan sebagai foreign key di tabel UMKM.'
                ], 400);
            }
            return response()->json([
                'message' => 'Terjadi kesalahan saat menghapus data.',
                'error' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menghapus data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function _get_role_by_id($id)
    {
        try {
            $role = Role::findOrFail($id);

            return response()->json($role, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat mengambil data role'], 500);
        }
    }

    public function _update_role(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('role')->withErrors($validator)->withInput();
        }

        $role = Role::findOrFail($request->input('id'));

        $role->update([
            'role' => $request->input('role'),
        ]);

        return redirect()->route('role')->with('success', 'Data role berhasil diperbarui');
    }
}
