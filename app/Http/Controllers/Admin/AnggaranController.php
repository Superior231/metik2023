<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggaranController extends Controller
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
            $path = $file->storeAs('public/anggaran', $fileName);

            $data['image'] = $fileName;
        }

        $data['harga'] = $request->input('satuan') * $request->input('jumlah');

        Anggaran::create($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $anggaran = Anggaran::find($id);
        $anggaran->type = $request->input('type', $anggaran->type);
        $anggaran->name = $request->input('name', $anggaran->name);
        $anggaran->satuan = $request->input('satuan', $anggaran->satuan);
        $anggaran->jumlah = $request->input('jumlah', $anggaran->jumlah);
        $anggaran->date = $request->input('date', $anggaran->date);

        $anggaran->harga = $request->input('satuan') * $request->input('jumlah');
    
        if ($request->hasFile('image')) {
            if ($anggaran->image) {
                Storage::disk('public')->delete('anggaran/' . $anggaran->image);
            }
    
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/anggaran', $fileName);
    
            $anggaran->image = $fileName;
        }
    
        $anggaran->save();
    
        return redirect()->back()->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggaran = Anggaran::find($id);

        if ($anggaran->image) {
            Storage::delete('public/anggaran/' . $anggaran->image);
        }

        $anggaran->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
