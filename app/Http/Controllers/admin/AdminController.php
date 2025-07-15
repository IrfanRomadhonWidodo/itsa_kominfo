<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Formulir;

class AdminController extends Controller
{
    public function index()
    {
        // Hitung data pengguna
        $totalUsers = User::count();
        $usersDiproses = User::where('status', 'diproses')->count();
        $usersDisetujui = User::where('status', 'disetujui')->count();
        $usersDitolak = User::where('status', 'ditolak')->count();

        // Hitung data feedback
        $totalFeedbacks = Feedback::count();
        $feedbackDiproses = Feedback::where('status', 'diproses')->count();
        $feedbackSelesai = Feedback::where('status', 'selesai')->count();

        // Hitung data formulir
        $totalFormulirs = Formulir::count();
        $formulirDiproses = Formulir::where('status', 'diproses')->count();
        $formulirRevisi = Formulir::where('status', 'revisi')->count();
        $formulirSelesai = Formulir::where('status', 'selesai')->count();

        return view('admin.dashboard', compact(
            'totalUsers', 'usersDiproses', 'usersDisetujui', 'usersDitolak',
            'totalFeedbacks', 'feedbackDiproses', 'feedbackSelesai',
            'totalFormulirs', 'formulirDiproses', 'formulirRevisi', 'formulirSelesai'
        ));
    }
}