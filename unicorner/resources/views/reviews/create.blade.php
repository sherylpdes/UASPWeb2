@extends('layout')

@section('title', 'Create Review')

@section('content')
<div class="container mt-5">
    <h2 style="margin-bottom: 1.5rem;">Create New Review</h2>
    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <div class="mb-3" style="margin-bottom: 0.3rem;">
            <label for="judul" class="form-label">Title</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3" style="margin-bottom: 0.3rem;">
            <label for="penulis" class="form-label">Author</label>
            <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" name="penulis" value="{{ old('penulis') }}" required>
            @error('penulis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3" style="margin-bottom: 0.3rem;">
            <label for="review" class="form-label">Review</label>
            <textarea class="form-control @error('review') is-invalid @enderror" id="review" name="review" rows="5" required>{{ old('review') }}</textarea>
            @error('review')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3" style="margin-bottom: 0.3rem;">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" value="{{ old('rating') }}" min="1" max="5" required>
            @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
