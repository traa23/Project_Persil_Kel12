<?php

namespace App\Http\Controllers;

use App\Models\JenisPenggunaan;
use Illuminate\Http\Request;

class JenisPenggunaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = JenisPenggunaan::latest()->paginate(10);
        return view('admin.jenis_penggunaan.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jenis_penggunaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_penggunaan' => 'required|string|max:100|unique:jenis_penggunaan,nama_penggunaan',
            'keterangan' => 'nullable|string',
        ]);

        JenisPenggunaan::create($data);
        return redirect()->route('admin.jenis-penggunaan.index')->with('success', 'Jenis penggunaan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPenggunaan $jenisPenggunaan)
    {
        return view('admin.jenis_penggunaan.show', compact('jenisPenggunaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPenggunaan $jenisPenggunaan)
    {
        return view('admin.jenis_penggunaan.edit', compact('jenisPenggunaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPenggunaan $jenisPenggunaan)
    {
        $data = $request->validate([
            'nama_penggunaan' => 'required|string|max:100|unique:jenis_penggunaan,nama_penggunaan,' . $jenisPenggunaan->jenis_id . ',jenis_id',
            'keterangan' => 'nullable|string',
        ]);

        $jenisPenggunaan->update($data);
        return redirect()->route('admin.jenis-penggunaan.index')->with('success', 'Jenis penggunaan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPenggunaan $jenisPenggunaan)
    {
        $jenisPenggunaan->delete();
        return redirect()->route('admin.jenis-penggunaan.index')->with('success', 'Jenis penggunaan berhasil dihapus');
    }
}
