<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function getDataTest(){
        $books = Book::all();
        return response()->json($books);
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $books = Book::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%")
                         ->orWhere('penulis', 'like', "%{$search}%");
        })->get();

        return view('books.index', ['books' => $books, 'search' => $search]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'gambar' => 'image|nullable|max:1999', // Ubah 'gambar' ke 'image'
            'deskripsi' => 'required',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0'
        ]);

        if ($request->hasFile('gambar')) {
            $filenameWithExt = $request->file('gambar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('gambar')->storeAs('public/gambar', $fileNameToStore);
        } else {
            $fileNameToStore = 'nogambar.jpg';
        }

        Book::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'gambar' => $fileNameToStore,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga
        ]);

        return redirect('/books')->with('success', 'Buku berhasil ditambahkan!'); // Ubah 'sukses' ke 'success'
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'gambar' => 'image|nullable|max:1999', // Ubah 'gambar' ke 'image'
            'deskripsi' => 'required',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0'
        ]);

        $book = Book::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $filenameWithExt = $request->file('gambar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('gambar')->storeAs('public/gambar', $fileNameToStore);

            if ($book->gambar != 'nogambar.jpg') {
                Storage::delete('public/gambar/'.$book->gambar);
            }
            $book->gambar = $fileNameToStore;
        }

        $book->judul = $request->judul;
        $book->penulis = $request->penulis;
        $book->deskripsi = $request->deskripsi;
        $book->stok = $request->stok;
        $book->harga = $request->harga;

        $book->save();

        return redirect()->route('books.index')->with('success', 'Buku berhasil di-update!'); // Ubah 'sukses' ke 'success'
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        if ($book->gambar != 'nogambar.jpg') {
            Storage::delete('public/gambar/'.$book->gambar);
        }
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!'); // Ubah 'sukses' ke 'success'
    }

    public function beli(Request $request, Book $book)
    {
        $request->validate([
            'kuantitas' => 'required|integer|min=1',
        ]);

        try {
            $book->reduceStock($request->kuantitas);
            return redirect()->route('books.show', $book->id)->with('success', 'Buku berhasil dibeli!'); // Ubah 'sukses' ke 'success'
        } catch (\Exception $e) {
            return redirect()->route('books.show', $book->id)->with('error', $e->getMessage());
        }
    }

    public function storeReview(Request $request, $bookId)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'penulis' => 'required|string|max:255',
        'review' => 'required|string',
        'rating' => 'required|integer|between:1,5'
    ]);

    Review::create([
        'judul' => $request->judul,
        'penulis' => $request->penulis,
        'review' => $request->review,
        'rating' => $request->rating
    ]);

    return redirect()->route('books.show', $bookId)->with('sukses', 'Review berhasil ditambahkan!');
}
}
