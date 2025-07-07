<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    /**
     * Menampilkan halaman notifikasi user.
     */
    public function index()
    {
        $notifikasi = Notifikasi::where('user_id', Auth::id())
                               ->with('feedback')
                               ->latest()
                               ->paginate(10);

        // Hitung jumlah notifikasi yang belum dibaca
        $unreadCount = Notifikasi::where('user_id', Auth::id())
                                 ->where('is_read', false)
                                 ->count();

        return view('pages.notifikasi', compact('notifikasi', 'unreadCount'));
    }

    /**
     * Tandai notifikasi sebagai sudah dibaca.
     */
    public function markAsRead($id)
    {
        $notifikasi = Notifikasi::where('id', $id)
                               ->where('user_id', Auth::id())
                               ->first();

        if ($notifikasi) {
            $notifikasi->markAsRead();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    /**
     * Tandai semua notifikasi sebagai sudah dibaca.
     */
    public function markAllAsRead()
    {
        Notifikasi::where('user_id', Auth::id())
            ->where('is_read', 0) // gunakan 0 jika di database nilainya 0/1
            ->update(['is_read' => 1]);

        return response()->json(['success' => true]);
    }

    /**
     * Lihat detail notifikasi dan balasan feedback.
     */
    public function show($id)
    {
        $notifikasi = Notifikasi::with('feedback')
                            ->where('id', $id)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();

        // Tandai sebagai sudah dibaca
        if (!$notifikasi->is_read) {
            $notifikasi->markAsRead();
        }

        return view('pages.notifikasi-detail', compact('notifikasi'));
    }
}