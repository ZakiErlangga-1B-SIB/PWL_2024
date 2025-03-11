@extends('adminlte::page')

@section('title', 'Kategori')

@section('content_header')
    <h1>Manajemen Kategori</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('kategori.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Kategori
        </a>

    </div>
    <div class="card-body">
    <table id="kategori-table" class="table table-bordered">
    <thead>
        <tr>
            <th>Kategori ID</th>
            <th>Kategori Kode</th>
            <th>Kategori Nama</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Aksi</th>
        </tr>
    </thead>
</table>

    </div>
</div>
@stop

@push('scripts')
<script>
$(document).ready(function() {
    $('#kategori-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('kategori.data') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'kode', name: 'kode' },
            { data: 'nama', name: 'nama' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});

</script>
@endpush
