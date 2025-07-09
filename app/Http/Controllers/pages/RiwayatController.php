<?php

namespace App\Http\Controllers\Pages;

use App\Models\Riwayat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* GET /riwayat */
    public function index()
    {
        // ambil riwayat milik user yang login
        $items = Riwayat::where('user_id', auth()->id())
                        ->latest('tanggal_permohonan')
                        ->paginate(10);

        return view('pages.riwayat', compact('items'));
    }

    // method lain (create, store, show …) boleh di‑hapus dulu kalau belum perlu
}