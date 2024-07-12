<?php

namespace App\Http\Controllers;

use App\Models\Pembina;
use App\Models\Umkm;
use App\Models\KategoriUmkm;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $umkms = Umkm::select('umkm.*', 'kategori_umkm.nama as kategori_nama', 'pembina.nama as pembina_nama')
            ->leftJoin('kategori_umkm', 'umkm.kategori_umkm_id', '=', 'kategori_umkm.id')
            ->leftJoin('pembina', 'umkm.pembina_id', '=', 'pembina.id')
            ->take(6)
            ->get();
        $pembina = $pembina = Pembina::all();

        $data = [
            "umkm" => $umkms,
            "pembina" => $pembina
        ];

        return view('index', compact('data'));
    }

    public function umkm()
    {
        $umkms = Umkm::select('umkm.*', 'kategori_umkm.nama as kategori_nama', 'pembina.nama as pembina_nama')
            ->leftJoin('kategori_umkm', 'umkm.kategori_umkm_id', '=', 'kategori_umkm.id')
            ->leftJoin('pembina', 'umkm.pembina_id', '=', 'pembina.id')
            ->paginate(6);
        $kategori = Umkm::select('umkm.kategori_umkm_id', 'umkm.pembina_id', 'kategori_umkm.nama as kategori_nama', 'pembina.nama as pembina_nama', DB::raw('COUNT(umkm.kategori_umkm_id) as jumlah'))
            ->leftJoin('kategori_umkm', 'umkm.kategori_umkm_id', '=', 'kategori_umkm.id')
            ->leftJoin('pembina', 'umkm.pembina_id', '=', 'pembina.id')
            ->groupBy('umkm.kategori_umkm_id', 'umkm.pembina_id', 'kategori_umkm.nama', 'pembina.nama')
            ->paginate(6);


        return view('umkm', compact('umkms', 'kategori'));
    }


    public function informasi($id)
    {
        $umkm = Umkm::select('umkm.*', 'kategori_umkm.nama as kategori_nama', 'pembina.nama as pembina_nama')
            ->leftJoin('kategori_umkm', 'umkm.kategori_umkm_id', '=', 'kategori_umkm.id')
            ->leftJoin('pembina', 'umkm.pembina_id', '=', 'pembina.id')
            ->where('umkm.id', $id)
            ->first();
        $kategori = Umkm::select('umkm.kategori_umkm_id', 'umkm.pembina_id', 'kategori_umkm.nama as kategori_nama', 'pembina.nama as pembina_nama', DB::raw('COUNT(umkm.kategori_umkm_id) as jumlah'))
            ->leftJoin('kategori_umkm', 'umkm.kategori_umkm_id', '=', 'kategori_umkm.id')
            ->leftJoin('pembina', 'umkm.pembina_id', '=', 'pembina.id')
            ->groupBy('umkm.kategori_umkm_id', 'umkm.pembina_id', 'kategori_umkm.nama', 'pembina.nama')
            ->paginate(6);

        return view('informasi', compact('umkm', 'kategori'));
    }

    public function pembina()
    {
        $pembinas = Pembina::all();
        return view('pembina', compact('pembinas'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function _pembina()
    {
        $pembina = Pembina::all();
        return response()->json($pembina);
    }
}
