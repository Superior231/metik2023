<?php

namespace App\Exports;

use App\Models\Anggaran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AnggaranExport implements WithStyles, FromView, WithTitle, ShouldAutoSize
{
    public function title(): string
    {
        return 'Anggaran METIK 2023';
    }

    public function view(): View
    {
        $anggaran = Anggaran::orderBy('name', 'asc')->get();
        $jml_anggaran = Anggaran::sum('harga');

        return view('exports.anggaranExcel', [
            'anggaran' => $anggaran,
            'jml_anggaran' => $jml_anggaran
        ]);
    }




    public function styles(Worksheet $sheet)
    {
        foreach(range('A','G') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }


        $sheet->getStyle('A1:G1')->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => '257cc4'],
            ],
            'font' => [
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => false,
            ],
        ]);

        $sheet->getStyle('A2:A16')->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => false,
            ],
        ]);

        $sheet->getStyle('G2:G16')->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => false,
            ],
        ]);

        $sheet->getStyle('A17')->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => false,
            ],
        ]);

        $sheet->getStyle('A17:G17')->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => '6c757d'],
            ],
            'font' => [
                'color' => ['rgb' => 'FFFFFF'],
            ],
        ]);

        $sheet->getStyle('F17')->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_RIGHT,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => false,
            ],
        ]);
    }
}
