@extends('layout')

@section('title', 'Reviews')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-lg-12">
            <h2 style="margin-bottom: 1.5rem;">List of Reviews</h2>
            <a class="btn btn-success" href="{{ route('reviews.create') }}">Add New Review</a>
        </div>
    </div>
e
    <form method="GET" action="{{ route('reviews.index') }}" class="mb-3">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search by title or author" class="form-control">
    </form>

    @if ($message = Session::get('sukses'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Author</th>
            <th>Rating</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($reviews as $i => $review)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $review->judul }}</td>
            <td>{{ $review->penulis }}</td>
            <td>{{ $review->rating }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('reviews.show', $review->id) }}">Tampil</a>
                <a class="btn btn-primary" href="{{ route('reviews.edit', $review->id) }}">Ubah</a>
                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
