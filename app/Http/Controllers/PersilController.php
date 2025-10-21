<?php

namespace App\Http\Controllers;

use App\Models\Persil;
use App\Models\User;
use Illuminate\Http\Request;

class PersilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Persil::latest()->paginate(10);
        return view('admin.persil.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('name')->get(['id', 'name', 'email']);
        return view('admin.persil.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_persil' => 'required|string|max:50|unique:persil,kode_persil',
            'pemilik_warga_id' => 'nullable|exists:users,id',
            'luas_m2' => 'nullable|numeric',
            'penggunaan' => 'nullable|string|max:100',
            'alamat_lahan' => 'nullable|string',
            'rt' => 'nullable|string|max:5',
            'rw' => 'nullable|string|max:5',
        ]);

        Persil::create($data);
        return redirect()->route('admin.persil.index')->with('success', 'Persil berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persil $persil)
    {
        return view('admin.persil.show', compact('persil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persil $persil)
    {
        $users = User::orderBy('name')->get(['id', 'name', 'email']);
        return view('admin.persil.edit', compact('persil', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persil $persil)
    {
        $data = $request->validate([
            'kode_persil' => 'required|string|max:50|unique:persil,kode_persil,' . $persil->persil_id . ',persil_id',
            'pemilik_warga_id' => 'nullable|exists:users,id',
            'luas_m2' => 'nullable|numeric',
            'penggunaan' => 'nullable|string|max:100',
            'alamat_lahan' => 'nullable|string',
            'rt' => 'nullable|string|max:5',
            'rw' => 'nullable|string|max:5',
        ]);

        $persil->update($data);
        return redirect()->route('admin.persil.index')->with('success', 'Persil berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persil $persil)
    {
        $persil->delete();
        return redirect()->route('admin.persil.index')->with('success', 'Persil berhasil dihapus');
    }
}
