<?php

namespace App\Http\Controllers;

use App\Models\Pembina;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PembinaController extends Controller
{
    public function index()
    {
        return view('admin/page/pembina/list');
    }

    public function _pembina()
    {
        $pembina = Pembina::all();
        return response()->json($pembina);
    }

    public function _list_pembina(Request $request)
    {
        $pembina = Pembina::all();

        $data = [
            "data" => $pembina
        ];

        return response()->json($data);
    }

    public function _post_pembina(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'gender' => 'required',
            'tgl_lahir' => 'required|date',
            'tmp_lahir' => 'required',
            'keahlian' => 'required',
            'quote' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pembina')->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }

        $pembina = new Pembina([
            'nama' => $request->input('nama'),
            'gender' => $request->input('gender'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'tmp_lahir' => $request->input('tmp_lahir'),
            'keahlian' => $request->input('keahlian'),
            'quote' => $request->input('quote'),
            'rating' => $request->input('rating'),
            'image' => $imageName,
        ]);

        $pembina->save();

        return redirect()->route('pembina')->with('success', 'Data Pembina berhasil disimpan');
    }

    public function _delete(string $id)
    {
        try {
            $pembina = Pembina::findOrFail($id);
            $pembina->delete();

            return response()->json([
                'message' => 'Data berhasil dihapus.'
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') { 
                return response()->json([
                    'message' => 'Data gagal dihapus karena ID Pembina ini masih digunakan sebagai foreign key di tabel UMKM.'
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


    public function _get_pembina_by_id($id)
    {
        try {
            $pembina = Pembina::findOrFail($id);

            return response()->json($pembina, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat mengambil data Pembina'], 500);
        }
    }

    public function _update_pembina(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'gender' => 'required',
            'tgl_lahir' => 'required',
            'tmp_lahir' => 'required',
            'keahlian' => 'required',
            'quote' => 'nullable',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pembina')->withErrors($validator)->withInput();
        }

        $pembina = Pembina::findOrFail($request->input('id'));

        if ($request->hasFile('image')) {
            if ($pembina->image && file_exists(public_path('images/' . $pembina->image))) {
                unlink(public_path('images/' . $pembina->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = $pembina->image;
        }

        $pembina->update([
            'nama' => $request->input('nama'),
            'gender' => $request->input('gender'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'tmp_lahir' => $request->input('tmp_lahir'),
            'keahlian' => $request->input('keahlian'),
            'quote' => $request->input('quote'),
            'rating' => $request->input('rating'),
            'image' => $imageName,
        ]);

        return redirect()->route('pembina')->with('success', 'Data Pembina berhasil diperbarui');
    }
}
