<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggaran;
use App\Models\Content;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {
        $content = Content::all();
        $gallery = Gallery::all();
        $anggaran = Anggaran::all();

        $jumlah_anggaran = $anggaran->sum('harga');

        return view('admin.index', [
            'content' => $content,
            'gallery' => $gallery,
            'anggaran' => $anggaran,
            'jml_anggaran' => $jumlah_anggaran
        ]);
    }

    public function update(Request $request, $id)
    {
        $content = Content::find($id);
        $content->title = $request->input('title', $content->title);
        $content->subtitle = $request->input('subtitle', $content->subtitle);
        $content->about_title = $request->input('about_title', $content->about_title);
        $content->about_subtitle = $request->input('about_subtitle', $content->about_subtitle);
        $content->footer = $request->input('footer', $content->footer);

        if ($request->hasFile('logo')) {
            if ($content->logo) {
                Storage::disk('public')->delete('logo/' . $content->logo);
            }
    
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/logo', $fileName);
    
            $content->logo = $fileName;
        }

        if ($request->hasFile('background')) {
            if ($content->background) {
                Storage::disk('public')->delete('background/' . $content->background);
            }
    
            $file = $request->file('background');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/background', $fileName);
    
            $content->background = $fileName;
        }

        $content->save();

        return redirect()->back()->with('success', 'Content berhasil diedit!');
    }
}
