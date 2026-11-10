@extends('layouts.app')

@section('title', 'Data Mata Kuliah')

@section('content')
    <x-page-header judul="Data Mata Kuliah"
                    deskripsi="Daftar mata kuliah sistem informasi akademik.">
        <a href="{{ route('matakuliah.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Mata Kuliah
        </a>
    </x-page-header>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-body fw-semibold">Daftar Mata Kuliah</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle" id="matakuliah-table">
                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th>Kode MK</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
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
        $('#matakuliah-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("matakuliah.data") }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'kode_mk', name: 'kode_mk' },
                { data: 'nama_mk', name: 'nama_mk' },
                { data: 'sks', name: 'sks' },
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
            ]
        });
    });

    function deleteData(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data mata kuliah akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('matakuliah') }}/" + id,
                    type: 'POST',
                    data: {
                        '_method': 'DELETE',
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire('Terhapus!', response.message, 'success');
                        $('#matakuliah-table').DataTable().ajax.reload();
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