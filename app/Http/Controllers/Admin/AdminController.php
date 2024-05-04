<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Judul;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $judul = Judul::all();

        return view('admin.index', [
            'judul' => $judul
        ]);
    }

    public function edit($id)
    {
        $judul = Judul::find($id);

        return view('admin.judul', [
            'judul' => $judul
        ]);
    }

    public function update(Request $request, $id)
    {
        $judul = judul::find($id);
        $judul->title = $request->input('title', $judul->title);
        $judul->subtitle = $request->input('subtitle', $judul->subtitle);
        $judul->about_title = $request->input('about_title', $judul->about_title);
        $judul->about_subtitle = $request->input('about_subtitle', $judul->about_subtitle);

        $judul->save();

        return redirect()->route('admin')->with('success', 'Anime berhasil diedit!');
    }
}
