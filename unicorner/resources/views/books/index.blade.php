@extends('layout')

@section('content')
<div class="row mt-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>List Buku</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-success" href="{{ route('books.create') }}">Tambah Buku</a>
        </div>
    </div>
</div>

<form method="GET" action="{{ route('books.index') }}" class="mb-3">
    <input type="text" name="search" value="{{ $search }}" placeholder="Search by title or author" class="form-control">
</form>

@if ($message = Session::get('sukses'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered" >
    <tr style="background-color: #007bff; color: #fff;">
        <th>No</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Stok</th>
        <th>Harga</th>
        <th width="280px">Action</th>
    </tr>

    @foreach ($books as $i => $book)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $book->judul }}</td>
        <td>{{ $book->penulis }}</td>
        <td>{{ $book->stok }}</td>
        <td>{{ $book->harga }}</td>
        <td>
            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('books.show', $book->id) }}">Tampil</a>
                <a class="btn btn-primary" href="{{ route('books.edit', $book->id) }}">Ubah</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
