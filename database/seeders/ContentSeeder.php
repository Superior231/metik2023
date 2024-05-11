<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Content::create([
            'title' => '“Revitalisasi Intelektualitas dan Mentalitas Mahasiswa Dalam Menghadapi Hegemoni Kampus”',
            'subtitle' => 'Kegiatan ini bernama “METIK“ (Mengenal Teknik), Fakultas Teknik & Ilmu Komputer Universitas Pancasakti Tegal Tahun 2023',
            'about_title' => 'METIK atau Mengenal Teknik Fakultas Teknik dan Ilmu Komputer',
            'about_subtitle' => 'halo',
            'footer' => 'METIK adalah kegiatan untuk mengenal Teknik, yaitu Teknik Mesin, Teknik Industri, Teknik Informatika, Teknik Sipil, dan Sistem Informasi. Tujuan dari kegiatan ini adalah untuk pengenalan kampus, pengenalan Fakultas Teknik dan Ilmu Komputer, dan untuk menjalin ikatan emosional / rasa memiliki Fakultas Teknik dan Ilmu Komputer.'
        ]);
    }
}
