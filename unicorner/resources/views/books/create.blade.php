@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div style="margin-bottom: 0.3rem;">
            <h2>Add New Book</h2>
        </div>
        <div style="margin-bottom: 1.5rem;">
            <a class="btn btn-primary" href="{{ route('books.index') }}">Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Ada kesalahan!<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 1.0rem;">
            <div class="form-group">
                <strong>Judul:</strong>
                <input type="text" name="judul" class="form-control" placeholder="Judul Buku" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 1.0rem;">
            <div class="form-group">
                <strong>Penulis:</strong>
                <input type="text" name="penulis" class="form-control" placeholder="Penulis Buku" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 1.0rem;">
            <div class="form-group">
                <strong>Gambar:</strong>
                <input type="file" name="gambar" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 1.0rem;">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Buku" required></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 1.0rem;">
            <div class="form-group">
                <strong>Stok:</strong>
                <input type="number" name="stok" class="form-control" placeholder="Stok Buku" required min="0">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 1.0rem;">
            <div class="form-group">
                <strong>Harga:</strong>
                <input type="number" name="harga" class="form-control" placeholder="Harga Buku" required step="0.01" min="0">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3" style="margin-bottom: 1.0rem;">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </div>
</form>
@endsection
