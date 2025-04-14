@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Manage Kategori</h2>

    <!-- Tombol Tambah Kategori -->
    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Add Kategori</a>

    <!-- Tabel Kategori -->
    <div class="table-responsive">
        <table id="kategoriTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Kategori ID</th>
                    <th>Kategori Kode</th>
                    <th>Kategori Nama</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $item)
                    <tr>
                        <td>{{ $item->kategori_id }}</td>
                        <td>{{ $item->kategori_kode }}</td>
                        <td>{{ $item->kategori_nama }}</td>
                        <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $item->updated_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol Hapus dengan Konfirmasi -->
                            <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- DataTables Script -->
@section('scripts')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kategoriTable').DataTable({
            "ordering": true, // Aktifkan sorting
            "searching": true, // Aktifkan pencarian
            "paging": true, // Aktifkan pagination
            "info": true // Tampilkan info
        });
    });
</script>
@endsection

@endsection
