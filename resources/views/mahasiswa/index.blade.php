@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
    <x-page-header judul="Data Mahasiswa"
                    deskripsi="Daftar mahasiswa sistem informasi akademik.">
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Mahasiswa
        </a>
    </x-page-header>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-body fw-semibold">Daftar Mahasiswa</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle" id="mahasiswa-table">
                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th>NIM</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Angkatan</th>
                            <th>Email</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

@push('scripts')
<script>
    $(function() {
        $('#mahasiswa-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("mahasiswa.data") }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nim', name: 'nim' },
                { data: 'nama', name: 'nama' },
                { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                { data: 'angkatan', name: 'angkatan' },
                { data: 'email', name: 'email' },
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
            ]
        });
    });

    // Fungsi hapus data menggunakan SweetAlert & AJAX
    function deleteData(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data mahasiswa akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('mahasiswa') }}/" + id,
                    type: 'POST',
                    data: {
                        '_method': 'DELETE',
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire('Terhapus!', response.message, 'success');
                        $('#mahasiswa-table').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                    }
                });
            }
        });
    }
</script>
@endpush
@endsection