<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;



class MovieFactory extends Factory
{
    public function definition(): array
    {
        $judul = [
            'Petualangan Nusantara',
            'Langit Senja',
            'Cinta di Ujung Jalan',
            'Misteri Gunung Merapi',
            'Jejak Pahlawan',
            'Kampung Impian',
            'Anak Pantai',
            'Rahasia Hutan Kalimantan',
            'Suara Hati',
            'Perjalanan Sang Guru'
        ];

        $sinopsis = [
            'Kisah perjuangan seorang anak desa meraih cita-cita.',
            'Cerita persahabatan yang penuh makna dan inspirasi.',
            'Perjalanan menemukan jati diri di tengah kehidupan kota.',
            'Petualangan seru mengungkap misteri yang tersembunyi.',
            'Kisah keluarga yang menghadapi berbagai ujian hidup.',
            'Perjuangan seorang guru mengajar di daerah terpencil.',
            'Cerita cinta yang tumbuh di tengah perbedaan.',
            'Kisah keberanian melindungi lingkungan dan alam.',
            'Perjalanan seorang pemuda meraih impian besar.',
            'Kisah inspiratif tentang semangat pantang menyerah.'
        ];

        return [
            'title' => fake()->randomElement($judul),
            'release_year' => fake()->numberBetween(1990, 2025),
            'director' => fake('id_ID')->name(),
            'synopsis' => fake()->randomElement($sinopsis),
                    'category_id' => Category::factory(),
        ];
    }
}