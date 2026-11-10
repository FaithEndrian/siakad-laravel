@extends('layouts.app')

@section('title', 'Kartu Rencana Studi')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">Kartu Rencana Studi</h1>
            <p class="text-muted mb-0">Daftar KRS mahasiswa sistem informasi akademik.</p>
        </div>
        <a href="{{ route('krs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah KRS
        </a>
    </div>

    <!-- FITUR 3: Filter Data Card -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="filter_tahun" class="form-label fw-semibold">Filter Tahun Akademik</label>
                    <select id="filter_tahun" class="form-select">
                        <option value="">-- Semua Tahun Akademik --</option>
                        @foreach($tahunAkademiks as $thn)
                            @if($thn)
                                <option value="{{ $thn }}">{{ $thn }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="filter_semester" class="form-label fw-semibold">Filter Semester</label>
                    <select id="filter_semester" class="form-select">
                        <option value="">-- Semua Semester --</option>
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button id="btn-reset" class="btn btn-secondary w-100">Reset Filter</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-body fw-semibold py-3">Daftar KRS</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle w-100" id="krs-table">
                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Tahun Akademik</th>
                            <th>Semester</th>
                            <th>Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function() {
        var table = $('#krs-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('krs.data') }}",
                data: function (d) {
                    d.filter_tahun = $('#filter_tahun').val();
                    d.filter_semester = $('#filter_semester').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nim', name: 'nim' },
                { data: 'nama', name: 'nama' },
                { data: 'tahun_akademik', name: 'tahun_akademik' },
                { data: 'semester', name: 'semester' },
                { data: 'status', name: 'status' },
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false },
            ]
        });

        // Event listener saat filter diganti
        $('#filter_tahun, #filter_semester').change(function() {
            table.ajax.reload();
        });

        // Reset Filter
        $('#btn-reset').click(function() {
            $('#filter_tahun').val('');
            $('#filter_semester').val('');
            table.ajax.reload();
        });
    });

    function deleteData(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data KRS yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('krs') }}/" + id,
                    type: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#krs-table').DataTable().ajax.reload();
                        Swal.fire(
                            'Terhapus!',
                            response.message,
                            'success'
                        );
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan saat menghapus data.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>
@endpush