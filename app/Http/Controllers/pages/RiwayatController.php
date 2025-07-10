<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Formulir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class RiwayatController extends Controller
{
    /**
     * Display the riwayat page
     */
    public function index()
    {
        $formulir = Formulir::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.riwayat', compact('formulir'));
    }

    /**
     * Show detail formulir
     */
    public function show($id)
    {
        $formulir = Formulir::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        return view('pages.riwayat-detail', compact('formulir'));
    }

    /**
     * Download PDF hasil ITSA
     */
    public function downloadPdf($id)
    {
        $formulir = Formulir::where('user_id', Auth::id())
            ->where('id', $id)
            ->where('status', 'selesai')
            ->firstOrFail();

        if (!$formulir->file_hasil_itsa) {
            return redirect()->back()->with('error', 'File PDF tidak tersedia.');
        }

        $filePath = storage_path('app/public/' . $formulir->file_hasil_itsa);
        
        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        return Response::download($filePath, 'ITSA_' . $formulir->nama_aplikasi . '.pdf');
    }

    /**
     * Get status badge class
     */
    public static function getStatusBadgeClass($status)
    {
        switch ($status) {
            case 'diproses':
                return 'bg-yellow-100 text-yellow-800 border-yellow-200';
            case 'revisi':
                return 'bg-red-100 text-red-800 border-red-200';
            case 'selesai':
                return 'bg-green-100 text-green-800 border-green-200';
            default:
                return 'bg-gray-100 text-gray-800 border-gray-200';
        }
    }

    /**
     * Get status text
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case 'Diproses':
                return 'Diproses';
            case 'revisi':
                return 'Revisi';
            case 'selesai':
                return 'Selesai';
            default:
                return 'Diproses';
        }
    }
}