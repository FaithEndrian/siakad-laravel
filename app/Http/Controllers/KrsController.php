<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KrsController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil daftar unik tahun akademik untuk dropdown filter
        $tahunAkademiks = Krs::select('tahun_akademik')->distinct()->pluck('tahun_akademik');
        return view('krs.index', compact('tahunAkademiks'));
    }

    public function data(Request $request)
    {
        $query = Mahasiswa::with(['krs.mataKuliah'])->select('mahasiswa.*');

        // FITUR 3: Filter Data berdasarkan Tahun Akademik dan Semester
        if ($request->filled('filter_tahun')) {
            $query->whereHas('krs', function($q) use ($request) {
                $q->where('tahun_akademik', $request->filter_tahun);
            });
        }

        if ($request->filled('filter_semester')) {
            $query->whereHas('krs', function($q) use ($request) {
                $q->where('semester', $request->filter_semester);
            });
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('nim', function ($row) {
                return $row->nim ?? '-';
            })
            ->addColumn('nama', function ($row) {
                return $row->nama ?? '-';
            })
            ->addColumn('tahun_akademik', function ($row) {
                $krs = $row->krs->first();
                return $krs ? $krs->tahun_akademik : '-';
            })
            ->addColumn('semester', function ($row) {
                $krs = $row->krs->first();
                return $krs ? $krs->semester : '-';
            })
            ->addColumn('status', function ($row) {
                $krs = $row->krs->first();
                if (!$krs) {
                    return '<span class="badge bg-secondary">Belum Ada</span>';
                }
                
                return match($krs->status) {
                    'disetujui' => '<span class="badge bg-success">Disetujui</span>',
                    'diajukan' => '<span class="badge bg-primary">Diajukan</span>',
                    'ditolak' => '<span class="badge bg-danger">Ditolak</span>',
                    default => '<span class="badge bg-secondary">Draft</span>',
                };
            })
            ->addColumn('aksi', function ($row) {
                $krs = $row->krs->first();
                if ($krs) {
                    $btn = '<a href="' . route('krs.show', $krs->id) . '" class="btn btn-outline-info btn-sm me-1"><i class="far fa-eye"></i></a>';
                    $btn .= '<a href="' . route('krs.edit', $krs->id) . '" class="btn btn-outline-warning btn-sm me-1"><i class="far fa-edit"></i></a>';
                    $btn .= '<button onclick="deleteData(' . $krs->id . ')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                    return $btn;
                } else {
                    return '-';
                }
            })
            ->rawColumns(['status', 'aksi'])
            ->make(true);
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $mataKuliah = MataKuliah::all();
        return view('krs.create', compact('mahasiswa', 'mataKuliah'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswa,id',
            'tahun_akademik' => 'required|string|max:9',
            'semester' => 'required|in:Ganjil,Genap',
            'status' => 'required|in:draft,diajukan,disetujui,ditolak',
            'mata_kuliah_ids' => 'required|array',
            'mata_kuliah_ids.*' => 'exists:mata_kuliah,id',
        ]);

        // FITUR 8: Pencegahan Duplikasi KRS (Cek apakah mahasiswa sudah punya KRS di Tahun & Semester yang sama)
        $existingKrs = Krs::where('mahasiswa_id', $validated['mahasiswa_id'])
                          ->where('tahun_akademik', $validated['tahun_akademik'])
                          ->where('semester', $validated['semester'])
                          ->first();

        if ($existingKrs) {
            return back()->withInput()->withErrors(['mahasiswa_id' => 'Mahasiswa ini sudah memiliki KRS pada Tahun Akademik dan Semester tersebut!']);
        }

        $krs = Krs::create([
            'mahasiswa_id' => $validated['mahasiswa_id'],
            'tahun_akademik' => $validated['tahun_akademik'],
            'semester' => $validated['semester'],
            'status' => $validated['status'],
        ]);

        if (method_exists($krs, 'mataKuliah')) {
            $krs->mataKuliah()->sync($validated['mata_kuliah_ids']);
        }

        return redirect()->route('krs.index')->with('success', 'Data KRS beserta detail mata kuliah berhasil ditambahkan.');
    }

    public function show($id)
    {
        $krs = Krs::with(['mahasiswa', 'mataKuliah'])->findOrFail($id);
        return view('krs.show', compact('krs'));
    }

    public function edit($id)
    {
        $krs = Krs::with('mataKuliah')->findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        $mataKuliah = MataKuliah::all();
        return view('krs.edit', compact('krs', 'mahasiswa', 'mataKuliah'));
    }

    public function update(Request $request, $id)
    {
        $krs = Krs::findOrFail($id);

        $validated = $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswa,id',
            'tahun_akademik' => 'required|string|max:9',
            'semester' => 'required|in:Ganjil,Genap',
            'status' => 'required|in:draft,diajukan,disetujui,ditolak',
            'mata_kuliah_ids' => 'required|array',
            'mata_kuliah_ids.*' => 'exists:mata_kuliah,id',
        ]);

        $krs->update([
            'mahasiswa_id' => $validated['mahasiswa_id'],
            'tahun_akademik' => $validated['tahun_akademik'],
            'semester' => $validated['semester'],
            'status' => $validated['status'],
        ]);

        if (method_exists($krs, 'mataKuliah')) {
            $krs->mataKuliah()->sync($validated['mata_kuliah_ids']);
        }

        return redirect()->route('krs.index')->with('success', 'Data KRS berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $krs = Krs::findOrFail($id);
        if (method_exists($krs, 'mataKuliah')) {
            $krs->mataKuliah()->detach();
        }
        $krs->delete();

        return response()->json(['message' => 'Data KRS berhasil dihapus.']);
    }
}