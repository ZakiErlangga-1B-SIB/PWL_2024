@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Data Supplier</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('supplier/create') }}">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover table-sm" id="table_supplier">
            <thead>
                <tr><th>ID</th><th>Nama Supplier</th><th>Alamat</th><th>Kontak</th><th>Aksi</th></tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#table_supplier').DataTable({
            serverSide: true,
            ajax: "{{ url('supplier/list') }}",
            columns: [
                { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
                { data: "nama_supplier", orderable: true, searchable: true },
                { data: "alamat", orderable: true, searchable: true },
                { data: "kontak", orderable: true, searchable: true },
                { data: "aksi", orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush
