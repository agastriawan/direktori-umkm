<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriUmkm;
use App\Models\Umkm;
use Illuminate\Support\Facades\Validator;
class UmkmController extends Controller
{
    public function index()
    {
        return view('admin/page/umkm/list');
    }

    public function _kategori_umkm()
    {
        $kategori = KategoriUmkm::all();
        return response()->json($kategori);
    }

    public function _post_umkm(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'pemilik' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'id_provinsi' => 'required|integer',
            'id_kabkota' => 'required|integer',
            'id_kategori' => 'required|integer',
            'id_pembina' => 'required|integer',
            'rating' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('umkm')->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }

        $umkm = new Umkm([
            'nama' => $request->input('nama'),
            'pemilik' => $request->input('pemilik'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'provinsi_id' => $request->input('id_provinsi'),
            'kabkota_id' => $request->input('id_kabkota'),
            'kategori_umkm_id' => $request->input('id_kategori'),
            'pembina_id' => $request->input('id_pembina'),
            'rating' => $request->input('rating'),
            'image' => $imageName,
            'alamat' => $request->input('alamat'),
            'modal' => $request->input('modal'),
            'harga' => $request->input('harga'),
            'deskripsi' => $request->input('deskripsi')
        ]);

        $umkm->save();

        return redirect()->route('umkm')->with('success', 'Data UMKM berhasil disimpan');
    }

    public function _get_umkm(Request $request)
    {
        $umkms = Umkm::select('umkm.*', 'kategori_umkm.nama as kategori_nama', 'pembina.nama as pembina_nama')
            ->leftJoin('kategori_umkm', 'umkm.kategori_umkm_id', '=', 'kategori_umkm.id')
            ->leftJoin('pembina', 'umkm.pembina_id', '=', 'pembina.id')
            ->get();

        $data = [
            "data" => $umkms
        ];

        return response()->json($data);
    }

    public function _delete(string $id)
    {
        try {
            $umkm = Umkm::findOrFail($id);
            $umkm->delete();

            return response()->json([
                'message' => 'Data berhasil dihapus.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menghapus data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function _get_umkm_by_id($id)
    {
        try {
            $umkm = Umkm::findOrFail($id);

            return response()->json($umkm, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat mengambil data UMKM'], 500);
        }
    }

    public function _update_umkm(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|max:255',
            'pemilik' => 'required|max:255',
            'email' => 'required|email|max:255',
            'website' => 'required|max:255',
            'id_provinsi' => 'required|integer',
            'id_kabkota' => 'required|integer',
            'id_kategori' => 'required|integer',
            'id_pembina' => 'required|integer',
            'rating' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('umkm')->withErrors($validator)->withInput();
        }

        $umkm = Umkm::findOrFail($request->input('id'));

        if ($request->hasFile('image')) {
            if ($umkm->image && file_exists(public_path('images/' . $umkm->image))) {
                unlink(public_path('images/' . $umkm->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = $umkm->image;
        }

        $umkm->update([
            'nama' => $request->input('nama'),
            'pemilik' => $request->input('pemilik'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'provinsi_id' => $request->input('id_provinsi'),
            'kabkota_id' => $request->input('id_kabkota'),
            'kategori_umkm_id' => $request->input('id_kategori'),
            'pembina_id' => $request->input('id_pembina'),
            'rating' => $request->input('rating'),
            'image' => $imageName,
            'alamat' => $request->input('alamat'),
            'modal' => $request->input('modal'),
            'harga' => $request->input('harga'),
            'deskripsi' => $request->input('deskripsi')
        ]);

        return redirect()->route('umkm')->with('success', 'Data UMKM berhasil diperbarui');
    }
}
