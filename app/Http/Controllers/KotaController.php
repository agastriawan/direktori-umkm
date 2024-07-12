<?php

namespace App\Http\Controllers;

use App\Models\Kota;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KotaController extends Controller
{
    public function index()
    {
        return view('admin/page/kota/list');
    }

  public function _list_kota(Request $request)
    {
        $kota = Kota::select('kabkota.*', 'provinsi.nama as provinsi_nama')
            ->leftJoin('provinsi', 'kabkota.provinsi_id', '=', 'provinsi.id')
            ->get();

        $data = [
            "data" => $kota
        ];

        return response()->json($data);
    }

    public function _post_kota(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'provinsi_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('kota')->withErrors($validator)->withInput();
        }

        $kota = new Kota([
            'nama' => $request->input('nama'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'provinsi_id' => $request->input('provinsi_id'),
        ]);

        $kota->save();

        return redirect()->route('kota')->with('success', 'Data kota berhasil disimpan');
    }

    public function _delete(string $id)
    {
        try {
            $kota = Kota::findOrFail($id);
            $kota->delete();

            return response()->json([
                'message' => 'Data berhasil dihapus.'
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') { 
                return response()->json([
                    'message' => 'Data gagal dihapus karena ID kota ini masih digunakan sebagai foreign key di tabel UMKM.'
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


    public function _get_kota_by_id($id)
    {
        try {
            $kota = Kota::findOrFail($id);

            return response()->json($kota, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat mengambil data kota'], 500);
        }
    }

    public function _update_kota(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'provinsi_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('kota')->withErrors($validator)->withInput();
        }

        $kota = Kota::findOrFail($request->input('id'));

        $kota->update([
            'nama' => $request->input('nama'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'provinsi_id' => $request->input('provinsi_id'),
        ]);

        return redirect()->route('kota')->with('success', 'Data kota berhasil diperbarui');
    }
}
