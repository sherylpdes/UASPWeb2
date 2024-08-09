<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Review;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function generatePDF()
    {
        $books = Book::all();
        $reviews = Review::all();

        $data = [
            'title' => 'Laporan Unicorner',
            'date' => date('m/d/Y'),
            'books' => $books,
            'reviews' => $reviews,
        ];

        $pdf = FacadePdf::loadView('laporanPDF', $data);

        return $pdf->download('laporan.pdf');

    }
}
