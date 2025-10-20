<?php

namespace App\Http\Controllers;

use App\Models\DokumenPersil;
use App\Models\Persil;
use Illuminate\Http\Request;

class DokumenPersilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = DokumenPersil::with('persil')->latest()->paginate(10);
        return view('admin.dokumen_persil.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $persil = Persil::orderBy('kode_persil')->get();
        return view('admin.dokumen_persil.create', compact('persil'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'persil_id' => 'required|exists:persil,persil_id',
            'jenis_dokumen' => 'required|string|max:100',
            'nomor' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|max:5120',
        ]);

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('dokumen_persil', 'public');
        }

        DokumenPersil::create($data);
        return redirect()->route('admin.dokumen-persil.index')->with('success', 'Dokumen persil berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(DokumenPersil $dokumenPersil)
    {
        $dokumenPersil->load('persil');
        return view('admin.dokumen_persil.show', compact('dokumenPersil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DokumenPersil $dokumenPersil)
    {
        $persil = Persil::orderBy('kode_persil')->get();
        return view('admin.dokumen_persil.edit', compact('dokumenPersil', 'persil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DokumenPersil $dokumenPersil)
    {
        $data = $request->validate([
            'persil_id' => 'required|exists:persil,persil_id',
            'jenis_dokumen' => 'required|string|max:100',
            'nomor' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|max:5120',
        ]);

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('dokumen_persil', 'public');
        }

        $dokumenPersil->update($data);
        return redirect()->route('admin.dokumen-persil.index')->with('success', 'Dokumen persil berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DokumenPersil $dokumenPersil)
    {
        $dokumenPersil->delete();
        return redirect()->route('admin.dokumen-persil.index')->with('success', 'Dokumen persil berhasil dihapus');
    }
}
