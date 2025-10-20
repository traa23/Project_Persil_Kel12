<?php

namespace App\Http\Controllers;

use App\Models\SengketaPersil;
use App\Models\Persil;
use Illuminate\Http\Request;

class SengketaPersilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = SengketaPersil::with('persil')->latest()->paginate(10);
        return view('admin.sengketa_persil.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $persil = Persil::orderBy('kode_persil')->get();
        return view('admin.sengketa_persil.create', compact('persil'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'persil_id' => 'required|exists:persil,persil_id',
            'pihak_1' => 'required|string|max:150',
            'pihak_2' => 'nullable|string|max:150',
            'kronologi' => 'nullable|string',
            'status' => 'nullable|string|max:100',
            'penyelesaian' => 'nullable|string',
            'file' => 'nullable|file|max:8192',
        ]);

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('sengketa_persil', 'public');
        }

        SengketaPersil::create($data);
        return redirect()->route('admin.sengketa-persil.index')->with('success', 'Sengketa persil berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(SengketaPersil $sengketaPersil)
    {
        $sengketaPersil->load('persil');
        return view('admin.sengketa_persil.show', compact('sengketaPersil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SengketaPersil $sengketaPersil)
    {
        $persil = Persil::orderBy('kode_persil')->get();
        return view('admin.sengketa_persil.edit', compact('sengketaPersil', 'persil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SengketaPersil $sengketaPersil)
    {
        $data = $request->validate([
            'persil_id' => 'required|exists:persil,persil_id',
            'pihak_1' => 'required|string|max:150',
            'pihak_2' => 'nullable|string|max:150',
            'kronologi' => 'nullable|string',
            'status' => 'nullable|string|max:100',
            'penyelesaian' => 'nullable|string',
            'file' => 'nullable|file|max:8192',
        ]);

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('sengketa_persil', 'public');
        }

        $sengketaPersil->update($data);
        return redirect()->route('admin.sengketa-persil.index')->with('success', 'Sengketa persil berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SengketaPersil $sengketaPersil)
    {
        $sengketaPersil->delete();
        return redirect()->route('admin.sengketa-persil.index')->with('success', 'Sengketa persil berhasil dihapus');
    }
}
