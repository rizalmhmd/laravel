<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AktivitasController extends Controller
{
    function index()
    {
        $data = Aktivitas::latest()->get();
        return view('aktivitas.index', compact('data'));
    }

    public function create()
    {
        // Hanya admin yang bisa akses
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('aktivitas.create');
    }

    public function store(Request $request)
    {
        // Hanya admin yang bisa akses
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'nama_aktivitas' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'status' => 'nullable|boolean'
        ]);

        Aktivitas::create($request->all());
        return redirect()->route('aktivitas.index')->with('success', 'Aktivitas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Hanya admin yang bisa akses
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        
        $aktivitas = Aktivitas::findOrFail($id);
        return view('aktivitas.edit', compact('aktivitas'));
    }

    public function update(Request $request, $id)
    {
        // Hanya admin yang bisa akses
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'nama_aktivitas' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'status' => 'nullable|boolean'
        ]);

        $aktivitas = Aktivitas::findOrFail($id);
        $aktivitas->update([
            'nama_aktivitas' => $request->nama_aktivitas,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'status' => $request->status
        ]);
        return redirect()->route('aktivitas.index')->with('success', 'Aktivitas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hanya admin yang bisa akses
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        
        $aktivitas = Aktivitas::findOrFail($id);
        $aktivitas->delete();
        return redirect()->back()->with('success', 'Aktivitas berhasil dihapus.');
    }

    public function show($id)
    {
        // Semua user (termasuk guest) bisa melihat detail
        $aktivitas = Aktivitas::findOrFail($id);
        return view('aktivitas.show', compact('aktivitas'));
    }
}