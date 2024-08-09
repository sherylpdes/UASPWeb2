@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div>
            <h2>Detail Buku</h2>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <a class="btn btn-primary" href="{{ route('books.index') }}">Kembali</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 0.3rem;">
        <div class="form-group">
            <strong>Judul:</strong>
            {{ $book->judul }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 0.3rem;">
        <div class="form-group">
            <strong>Penulis:</strong>
            {{ $book->penulis }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 0.3rem;">
        <div class="form-group">
            <strong>Stok:</strong>
            {{ $book->stok }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 0.3rem;">
        <div class="form-group">
            <strong>Harga:</strong>
            {{ $book->harga }} 
        </div>
    </div>

    @if($book->gambar && $book->gambar !== 'nogambar.jpg')
    <img src="{{ asset('storage/gambar/' . $book->gambar) }}" alt="{{ $book->judul }}" class="img-thumbnail">
@else
    <p>No image available</p>
@endif
<br><br>

@if (session('sukses'))
    <div class="alert alert-success">
        {{ session('sukses') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
</div>
@endsection
