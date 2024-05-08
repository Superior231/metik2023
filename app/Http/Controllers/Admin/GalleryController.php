<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/gallery', $fileName);
    
            $data['image'] = $fileName;
        }

        Gallery::create($data);

        return redirect()->back()->with('success', 'Gambar berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::find($id);
        $gallery->description = $request->input('description', $gallery->description);
    
        if ($request->hasFile('image')) {
            if ($gallery->image) {
                Storage::disk('public')->delete('gallery/' . $gallery->image);
            }
    
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/gallery', $fileName);
    
            $gallery->image = $fileName;
        }
    
        $gallery->save();
    
        return redirect()->back()->with('success', 'Gambar berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::find($id);

        if ($gallery->image) {
            Storage::delete('public/gallery/' . $gallery->image);
        }

        $gallery->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus!');
    }
}
