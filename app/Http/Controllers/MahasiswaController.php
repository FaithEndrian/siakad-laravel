<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan halaman index mahasiswa.
     */
    public function index()
    {
        return view('mahasiswa.index');
    }

    /**
     * Endpoint JSON untuk Yajra DataTables (Server-Side).
     */
    public function data()
    {
        $mahasiswa = Mahasiswa::select(['id', 'nim', 'nama', 'jenis_kelamin', 'angkatan', 'email']);

        return DataTables::of($mahasiswa)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $btn = '<a href="' . route('mahasiswa.show', $row->id) . '" class="btn btn-outline-info btn-sm me-1"><i class="far fa-eye"></i></a>';
                $btn .= '<a href="' . route('mahasiswa.edit', $row->id) . '" class="btn btn-outline-warning btn-sm me-1"><i class="far fa-edit"></i></a>';
                $btn .= '<button onclick="deleteData(' . $row->id . ')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * Menampilkan form tambah mahasiswa.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Menyimpan data mahasiswa baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswa,nim|max:20',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'angkatan' => 'required|string|max:4',
            'email' => 'required|email|unique:mahasiswa,email',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail mahasiswa spesifik berdasarkan ID.
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Menampilkan form edit mahasiswa.
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Memperbarui data mahasiswa di database.
     */
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $validated = $request->validate([
            'nim' => 'required|max:20|unique:mahasiswa,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'angkatan' => 'required|string|max:4',
            'email' => 'required|email|unique:mahasiswa,email,' . $mahasiswa->id,
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Menghapus data mahasiswa via AJAX.
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return response()->json(['message' => 'Data mahasiswa berhasil dihapus.']);
    }
}