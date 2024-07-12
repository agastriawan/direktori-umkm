<?php

namespace App\Http\Controllers;

use App\Models\KategoriUmkm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        return view('admin/page/kategori/list');
    }

    public function _list_kategori(Request $request)
    {
        $pembina = KategoriUmkm::all();

        $data = [
            "data" => $pembina
        ];

        return response()->json($data);
    }

    public function _post_kategori(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('kategori')->withErrors($validator)->withInput();
        }

        $kategori = new KategoriUmkm([
            'nama' => $request->input('nama'),
        ]);

        $kategori->save();

        return redirect()->route('kategori')->with('success', 'Data Kategori berhasil disimpan');
    }

    public function _delete(string $id)
    {
        try {
            $kategori = KategoriUmkm::findOrFail($id);
            $kategori->delete();

            return response()->json([
                'message' => 'Data berhasil dihapus.'
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') { 
                return response()->json([
                    'message' => 'Data gagal dihapus karena ID Kategori ini masih digunakan sebagai foreign key di tabel UMKM.'
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


    public function _get_kategori_by_id($id)
    {
        try {
            $kategori = KategoriUmkm::findOrFail($id);

            return response()->json($kategori, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat mengambil data Kategori'], 500);
        }
    }

    public function _update_kategori(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('kategori')->withErrors($validator)->withInput();
        }

        $kategori = KategoriUmkm::findOrFail($request->input('id'));

        $kategori->update([
            'nama' => $request->input('nama')
        ]);

        return redirect()->route('kategori')->with('success', 'Data Kategori berhasil diperbarui');
    }
}
