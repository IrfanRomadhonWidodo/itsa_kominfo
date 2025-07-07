<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackAdminController extends Controller
{
    /**
     * Menampilkan daftar feedback dengan fungsionalitas pencarian.
     */
    public function index(Request $request)
    {
        $query = Feedback::with('user');

        // Logika untuk pencarian
        if ($request->has('search') && $request->search != '') {
            $searchTerm = '%' . $request->search . '%';
            $query->where('subjek', 'like', $searchTerm)
                  ->orWhere('pesan', 'like', $searchTerm)
                  ->orWhere('status', 'like', $searchTerm)
                  ->orWhereHas('user', function($q) use ($searchTerm) {
                      $q->where('name', 'like', $searchTerm);
                  });
        }

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $feedbacks = $query->latest()->paginate(10);
        return view('admin.feedbacks', compact('feedbacks'));
    }

    /**
     * Menampilkan detail feedback.
     */
    public function show(Feedback $feedback)
    {
        $feedback->load('user');
        return response()->json($feedback);
    }

    /**
     * Memperbarui feedback (untuk balasan admin).
     */
    public function update(Request $request, Feedback $feedback)
    {
        $request->validate([
            'balasan_admin' => ['required', 'string'],
        ]);

        $feedback->update([
            'balasan_admin' => $request->balasan_admin,
            'status' => 'selesai', // Otomatis set ke selesai jika sudah ada balasan
        ]);

        return redirect()->route('admin.feedbacks.index')->with('success', 'Feedback berhasil dibalas.');
    }

    /**
     * Menghapus feedback dari database.
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('admin.feedbacks.index')->with('success', 'Feedback berhasil dihapus.');
    }
}