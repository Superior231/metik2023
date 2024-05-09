<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use App\Models\Gallery;
use App\Models\Judul;
use Illuminate\Http\Request;

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
        $judul = Judul::all();
        $gallery = Gallery::all();
        $anggaran = Anggaran::all();

        $jumlah_anggaran = $anggaran->sum('harga');

        return view('index', [
            'judul' => $judul,
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
}
