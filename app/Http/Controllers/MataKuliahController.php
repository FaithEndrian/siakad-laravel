<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MataKuliahController extends Controller
{
    /**
     * Menampilkan halaman index mata kuliah.
     */
    public function index()
    {
        return view('matakuliah.index');
    }

    /**
     * Endpoint JSON untuk Yajra DataTables (Server-Side).
     */
    public function data()
    {
        $matakuliah = MataKuliah::select(['id', 'kode_mk', 'nama_mk', 'sks']);

        return DataTables::of($matakuliah)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $btn = '<a href="' . route('matakuliah.show', $row->id) . '" class="btn btn-outline-info btn-sm me-1"><i class="far fa-eye"></i></a>';
                $btn .= '<a href="' . route('matakuliah.edit', $row->id) . '" class="btn btn-outline-warning btn-sm me-1"><i class="far fa-edit"></i></a>';
                $btn .= '<button onclick="deleteData(' . $row->id . ')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * Menampilkan form tambah mata kuliah.
     */
    public function create()
    {
        return view('matakuliah.create');
    }

    /**
     * Menyimpan data mata kuliah baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_mk' => 'required|unique:mata_kuliah,kode_mk|max:20',
            'nama_mk' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        MataKuliah::create($validated);

        return redirect()->route('matakuliah.index')->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail mata kuliah.
     */
    public function show($id)
    {
        $matakuliah = MataKuliah::findOrFail($id);
        return view('matakuliah.show', compact('matakuliah'));
    }

    /**
     * Menampilkan form edit mata kuliah.
     */
    public function edit($id)
    {
        $matakuliah = MataKuliah::findOrFail($id);
        return view('matakuliah.edit', compact('matakuliah'));
    }

    /**
     * Memperbarui data mata kuliah di database.
     */
    public function update(Request $request, $id)
    {
        $matakuliah = MataKuliah::findOrFail($id);

        $validated = $request->validate([
            'kode_mk' => 'required|max:20|unique:mata_kuliah,kode_mk,' . $matakuliah->id,
            'nama_mk' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        $matakuliah->update($validated);

        return redirect()->route('matakuliah.index')->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    /**
     * Menghapus data mata kuliah via AJAX.
     */
    public function destroy($id)
    {
        $matakuliah = MataKuliah::findOrFail($id);
        $matakuliah->delete();

        return response()->json(['message' => 'Data mata kuliah berhasil dihapus.']);
    }
}