<?php

namespace App\Exports;

use App\Models\Anggaran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Mpdf\Mpdf;

class AnggaranExportPdf implements FromView
{
    public function view(): View
    {
        $anggaran = Anggaran::all();
        $jml_anggaran = Anggaran::sum('harga');

        return view('exports.anggaranPdf', [
            'anggaran' => $anggaran,
            'jml_anggaran' => $jml_anggaran
        ]);
    }

    public function exportPdf()
    {
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($this->view()->render());
        $mpdf->Output('Anggaran METIK 2023.pdf', 'I');
    }
}
