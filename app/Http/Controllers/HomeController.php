<?php

namespace App\Http\Controllers;

use App\Exports\AnggaranExport;
use App\Exports\AnggaranExportPdf;
use App\Models\Anggaran;
use App\Models\Content;
use App\Models\Gallery;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $content = Content::all();
        $gallery = Gallery::all();
        $anggaran = Anggaran::all();

        $jumlah_anggaran = $anggaran->sum('harga');

        return view('index', [
            'content' => $content,
            'gallery' => $gallery,
            'anggaran' => $anggaran,
            'jml_anggaran' => $jumlah_anggaran
        ]);
    }

    public function download_image($id)
    {
        $gallery = Gallery::find($id);

        if ($gallery) {
            $imagePath = storage_path('app/public/gallery/' . $gallery->image);

            return response()->download($imagePath);
        }

        return redirect()->back()->with('error', 'Gambar tidak ditemukan!');
    }

    public function download_kwitansi($id)
    {
        $anggaran = Anggaran::find($id);

        if ($anggaran && $anggaran->image) {
            $imagePath = storage_path('app/public/anggaran/' . $anggaran->image);

            return response()->download($imagePath);
        }

        return redirect()->back()->with('error', 'Gambar tidak ditemukan!');
    }


    // Exports Table to Excel and Pdf
    public function anggaran_excel()
    {
        return Excel::download(new AnggaranExport, 'Anggaran METIK 2023.xlsx');
    }

    public function anggaran_pdf()
    {
        $exportPdf = new AnggaranExportPdf();
        $exportPdf->exportPdf();
    }
}
