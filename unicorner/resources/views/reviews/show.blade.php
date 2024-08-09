@extends('layout')

@section('title', 'Review Details')

@section('content')
<div class="container mt-5">
    <h2 style="margin-bottom: 1.5rem;">Review Details</h2>
    <div class="mb-3" style="margin-bottom: 0.3rem;">
        <strong>Title:</strong>
        <p>{{ $review->judul }}</p>
    </div>
    <div class="mb-3" style="margin-bottom: 0.3rem;">
        <strong>Author:</strong>
        <p>{{ $review->penulis }}</p>
    </div>
    <div class="mb-3" style="margin-bottom: 0.3rem;">
        <strong>Review:</strong>
        <p>{{ $review->review }}</p>
    </div>
    <div class="mb-3" style="margin-bottom: 0.3rem;">
        <strong>Rating:</strong>
        <p>{{ $review->rating }}</p>
    </div>
    <a class="btn btn-primary" href="{{ route('reviews.index') }}">Back to Reviews</a>
</div>
@endsection
