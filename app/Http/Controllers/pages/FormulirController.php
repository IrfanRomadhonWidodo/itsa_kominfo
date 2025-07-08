<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formulir;
use Illuminate\Support\Facades\Auth;

class FormulirController extends Controller
{
    public function index()
    {
        $formulir = Formulir::where('user_id', Auth::id())->get();
        return view('pages.formulir.index', compact('formulir'));
    }

    public function create()
    {
        return view('pages.formulir.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_aplikasi' => 'required|string|max:255',
            // Tambahkan semua field validasi yang kamu butuhkan
        ]);

        $validated['user_id'] = Auth::id();

        Formulir::create($validated);

        return redirect()->route('formulir.index')->with('status', 'Formulir berhasil dikirim.');
    }

    public function show(Formulir $formulir)
    {
        return view('pages.formulir.show', compact('formulir'));
    }

    public function edit(Formulir $formulir)
    {
        return view('pages.formulir.edit', compact('formulir'));
    }

    public function update(Request $request, Formulir $formulir)
    {
        $validated = $request->validate([
            'nama_aplikasi' => 'required|string|max:255',
        ]);

        $formulir->update($validated);

        return redirect()->route('formulir.index')->with('status', 'Formulir diperbarui.');
    }

    public function destroy(Formulir $formulir)
    {
        $formulir->delete();

        return redirect()->route('formulir.index')->with('status', 'Formulir dihapus.');
    }
}