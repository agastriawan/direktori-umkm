<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProvinsiController extends Controller
{
    public function index()
    {
        return view('admin/page/provinsi/list');
    }

    public function _list_provinsi(Request $request)
    {
        $pembina = Provinsi::all();

        $data = [
            "data" => $pembina
        ];

        return response()->json($data);
    }

    public function _post_provinsi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'ibukota' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('provinsi')->withErrors($validator)->withInput();
        }

        $provinsi = new Provinsi([
            'nama' => $request->input('nama'),
            'ibukota' => $request->input('ibukota'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);

        $provinsi->save();

        return redirect()->route('provinsi')->with('success', 'Data provinsi berhasil disimpan');
    }

    public function _delete(string $id)
    {
        try {
            $provinsi = Provinsi::findOrFail($id);
            $provinsi->delete();

            return response()->json([
                'message' => 'Data berhasil dihapus.'
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') { 
                return response()->json([
                    'message' => 'Data gagal dihapus karena ID provinsi ini masih digunakan sebagai foreign key di tabel UMKM.'
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


    public function _get_provinsi_by_id($id)
    {
        try {
            $provinsi = Provinsi::findOrFail($id);

            return response()->json($provinsi, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat mengambil data provinsi'], 500);
        }
    }

    public function _update_provinsi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'ibukota' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('provinsi')->withErrors($validator)->withInput();
        }

        $provinsi = Provinsi::findOrFail($request->input('id'));

        $provinsi->update([
            'nama' => $request->input('nama'),
            'ibukota' => $request->input('ibukota'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);

        return redirect()->route('provinsi')->with('success', 'Data provinsi berhasil diperbarui');
    }
}
