<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::pluck('id')->toArray();

        $judul = [
            'Petualangan Nusantara',
            'Langit Senja',
            'Cinta di Ujung Jalan',
            'Jejak Pahlawan',
            'Misteri Gunung Merapi',
            'Suara Hati',
            'Anak Pantai',
            'Kampung Impian',
            'Rahasia Hutan Kalimantan',
            'Perjalanan Sang Guru'
        ];

        $sinopsis = [
            'Kisah perjuangan seorang anak desa meraih cita-cita.',
            'Cerita persahabatan yang penuh makna.',
            'Perjalanan menemukan jati diri di tengah kehidupan kota.',
            'Petualangan mengungkap misteri yang tersembunyi.',
            'Kisah keluarga yang menghadapi berbagai ujian hidup.',
            'Perjuangan seorang guru di daerah terpencil.',
            'Cerita cinta yang tumbuh di tengah perbedaan.',
            'Kisah keberanian menjaga alam Indonesia.',
            'Perjalanan seorang pemuda meraih impian.',
            'Kisah inspiratif tentang semangat pantang menyerah.'
        ];

        for ($i = 1; $i <= 100; $i++) {
            Movie::create([
                'category_id'  => $categories[array_rand($categories)],
                'title'        => $judul[array_rand($judul)] . " " . $i,
                'release_year' => rand(1990, 2025),
                'director'     => fake('id_ID')->name(),
                'synopsis'     => $sinopsis[array_rand($sinopsis)],
            ]);
        }
    }
}