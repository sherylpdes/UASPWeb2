<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $reviews = Review::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%")
                         ->orWhere('penulis', 'like', "%{$search}%");
        })->get();

        return view('reviews.index', ['reviews' => $reviews, 'search' => $search]);
  }

    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'review' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create($request->all());

        return redirect()->route('reviews.index')->with('sukses', 'Review berhasil ditambahkan!');
    }

    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'review' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review->update($request->all());

        return redirect()->route('reviews.index')->with('sukses', 'Review berhasil di-update!');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('reviews.index')->with('sukses', 'Review berhasil dihapus!');
    }
}
