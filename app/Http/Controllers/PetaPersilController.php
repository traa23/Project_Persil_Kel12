<?php

namespace App\Http\Controllers;

use App\Models\PetaPersil;
use App\Models\Persil;
use Illuminate\Http\Request;

class PetaPersilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = PetaPersil::with('persil')->latest()->paginate(10);
        return view('admin.peta_persil.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $persil = Persil::orderBy('kode_persil')->get();
        return view('admin.peta_persil.create', compact('persil'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'persil_id' => 'required|exists:persil,persil_id',
            'geojson' => 'nullable|string',
            'panjang_m' => 'nullable|numeric',
            'lebar_m' => 'nullable|numeric',
            'file' => 'nullable|file|max:8192',
        ]);

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('peta_persil', 'public');
        }

        PetaPersil::create($data);
        return redirect()->route('admin.peta-persil.index')->with('success', 'Peta persil berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(PetaPersil $petaPersil)
    {
        $petaPersil->load('persil');
        return view('admin.peta_persil.show', compact('petaPersil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PetaPersil $petaPersil)
    {
        $persil = Persil::orderBy('kode_persil')->get();
        return view('admin.peta_persil.edit', compact('petaPersil', 'persil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PetaPersil $petaPersil)
    {
        $data = $request->validate([
            'persil_id' => 'required|exists:persil,persil_id',
            'geojson' => 'nullable|string',
            'panjang_m' => 'nullable|numeric',
            'lebar_m' => 'nullable|numeric',
            'file' => 'nullable|file|max:8192',
        ]);

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('peta_persil', 'public');
        }

        $petaPersil->update($data);
        return redirect()->route('admin.peta-persil.index')->with('success', 'Peta persil berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PetaPersil $petaPersil)
    {
        $petaPersil->delete();
        return redirect()->route('admin.peta-persil.index')->with('success', 'Peta persil berhasil dihapus');
    }
}
