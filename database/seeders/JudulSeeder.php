<?php

namespace Database\Seeders;

use App\Models\Judul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JudulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Judul::create([
            'title' => '“Revitalisasi Intelektualitas dan Mentalitas Mahasiswa Dalam Menghadapi Hegemoni Kampus”',
            'subtitle' => 'Kegiatan ini bernama “METIK“ (Mengenal Teknik), Fakultas Teknik & Ilmu Komputer Universitas Pancasakti Tegal Tahun 2023',
            'about_title' => 'METIK atau Mengenal Teknik Fakultas Teknik dan Ilmu Komputer',
            'about_subtitle' => 'halo'
        ]);
    }
}
