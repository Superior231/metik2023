<?php

namespace App\Http\Controllers;

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

        return view('index', [
            'judul' => $judul,
            'gallery' => $gallery
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
}
