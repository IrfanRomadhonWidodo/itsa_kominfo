<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formulir;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormulirAdminController extends Controller
{
    /**
     * Menampilkan daftar formulir dengan fungsionalitas pencarian.
     */
    public function index(Request $request)
    {
        $query = Formulir::with('user');

        // Logika untuk pencarian
        if ($request->has('search') && $request->search != '') {
            $searchTerm = '%' . $request->search . '%';
            $query->where('nama_aplikasi', 'like', $searchTerm)
                  ->orWhere('domain_aplikasi', 'like', $searchTerm)
                  ->orWhere('ip_address', 'like', $searchTerm)
                  ->orWhere('status', 'like', $searchTerm)
                  ->orWhereHas('user', function($q) use ($searchTerm) {
                      $q->where('name', 'like', $searchTerm);
                  });
        }

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $formulirs = $query->latest()->paginate(10);
        return view('admin.formulir', compact('formulirs'));
    }

    /**
     * Menampilkan detail formulir.
     */
    public function show(Formulir $formulir)
    {
        $formulir->load('user');
        return response()->json($formulir);
    }

    /**
     * Memperbarui formulir (untuk balasan admin).
     */
    public function update(Request $request, Formulir $formulir)
    {
        $request->validate([
            'balasan_admin' => ['required', 'string'],
        ]);

        $formulir->update([
            'balasan_admin' => $request->balasan_admin,
            'status' => 'revisi', // Otomatis set ke revisi jika ada balasan admin
        ]);

        // Buat notifikasi untuk user
        Notifikasi::create([
            'user_id' => $formulir->user_id,
            'judul' => 'Formulir Perlu Revisi: ' . $formulir->nama_aplikasi,
            'pesan' => 'Admin telah memberikan balasan untuk formulir aplikasi "' . $formulir->nama_aplikasi . '". Silakan lakukan revisi sesuai catatan admin.',
            'type' => 'formulir',
            'formulir_id' => $formulir->id,
            'is_read' => false,
        ]);

        return redirect()->route('admin.formulir.index')->with('success', 'Balasan berhasil dikirim dan status formulir diubah menjadi revisi.');
    }

    /**
     * Upload file hasil ITSA.
     */
    public function uploadHasilItsa(Request $request, Formulir $formulir)
    {
        $request->validate([
            'file_hasil_itsa' => ['required', 'file', 'mimes:pdf', 'max:10240'], // Max 10MB
        ]);

        // Hapus file lama jika ada
        if ($formulir->file_hasil_itsa) {
            Storage::disk('public')->delete($formulir->file_hasil_itsa);
        }

        // Upload file baru
        $fileName = time() . '_' . $request->file('file_hasil_itsa')->getClientOriginalName();
        $filePath = $request->file('file_hasil_itsa')->storeAs('hasil_itsa', $fileName, 'public');

        $formulir->update([
            'file_hasil_itsa' => $filePath,
            'status' => 'selesai', // Otomatis set ke selesai jika file hasil ITSA diupload
        ]);

        // Buat notifikasi untuk user
        Notifikasi::create([
            'user_id' => $formulir->user_id,
            'judul' => 'File Hasil ITSA Tersedia: ' . $formulir->nama_aplikasi,
            'pesan' => 'File hasil ITSA untuk aplikasi "' . $formulir->nama_aplikasi . '" telah tersedia dan dapat didownload.',
            'type' => 'formulir',
            'formulir_id' => $formulir->id,
            'is_read' => false,
        ]);

        return redirect()->route('admin.formulir.index')->with('success', 'File hasil ITSA berhasil diupload dan status formulir diubah menjadi selesai.');
    }

    /**
     * Download file hasil ITSA.
     */
    public function downloadHasilItsa(Formulir $formulir)
    {
        if (!$formulir->file_hasil_itsa || !Storage::disk('public')->exists($formulir->file_hasil_itsa)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        return Storage::disk('public')->download($formulir->file_hasil_itsa);
    }

    /**
     * Menghapus formulir dari database.
     */
    public function destroy(Formulir $formulir)
    {
        // Hapus file hasil ITSA jika ada
        if ($formulir->file_hasil_itsa) {
            Storage::disk('public')->delete($formulir->file_hasil_itsa);
        }

        $formulir->delete();
        return redirect()->route('admin.formulir.index')->with('success', 'Formulir berhasil dihapus.');
    }
}