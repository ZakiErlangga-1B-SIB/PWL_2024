@extends('adminlte::page')

@section('title', 'Edit Kategori')

@section('content_header')
    <h1>Edit Kategori</h1>
@stop

@section('content_body')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kategori.update', $kategori->kategori_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Kode Kategori</label>
                    <input type="text" name="kategori_kode" class="form-control" value="{{ $kategori->kategori_kode }}" required>
                </div>
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="kategori_nama" class="form-control" value="{{ $kategori->kategori_nama }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@stop