<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CampaignSeeder extends Seeder
{
    public function run(): void
    {
        $campaigns = [
            [
                'title' => 'Donasi Korban Banjir Semarang',
                'description' => 'Banjir besar melanda beberapa wilayah di Semarang dan menyebabkan banyak keluarga kehilangan tempat tinggal serta harta benda mereka. Bantuan dari kita semua sangat dibutuhkan untuk menyediakan kebutuhan darurat seperti makanan, air bersih, pakaian, dan obat-obatan. Melalui campaign ini, mari bersama-sama membantu saudara kita agar dapat bangkit kembali dan menjalani kehidupan yang lebih baik.',
                'target_amount' => 5000000,
                'image' => 'campaign1.jpg',
            ],
            [
                'title' => 'Pembangunan Masjid Al-Ikhlas',
                'description' => 'Masjid Al-Ikhlas merupakan pusat kegiatan ibadah dan sosial masyarakat di lingkungan sekitar. Namun kondisi bangunan saat ini sudah tidak lagi memadai untuk menampung jamaah yang semakin bertambah. Melalui program donasi ini, kami mengajak Anda semua untuk berpartisipasi dalam pembangunan masjid agar dapat menjadi tempat ibadah yang nyaman dan bermanfaat bagi generasi sekarang maupun yang akan datang.',
                'target_amount' => 20000000,
                'image' => 'campaign2.jpg',
            ],
            [
                'title' => 'Bantuan Pendidikan Anak Yatim',
                'description' => 'Banyak anak yatim yang memiliki semangat belajar tinggi namun terkendala oleh keterbatasan ekonomi. Donasi yang terkumpul akan digunakan untuk membantu biaya pendidikan, perlengkapan sekolah, serta kebutuhan belajar lainnya. Dengan dukungan dari para donatur, diharapkan anak-anak ini dapat terus melanjutkan pendidikan mereka dan meraih masa depan yang lebih cerah.',
                'target_amount' => 10000000,
                'image' => 'campaign3.jpg',
            ],
            [
                'title' => 'Pengobatan Anak Penderita Leukemia',
                'description' => 'Seorang anak kecil sedang berjuang melawan penyakit leukemia yang membutuhkan perawatan medis intensif dan biaya yang tidak sedikit. Keluarga pasien mengalami kesulitan untuk memenuhi biaya pengobatan yang terus berjalan. Melalui campaign ini, kami mengajak Anda untuk turut membantu meringankan beban keluarga agar proses pengobatan dapat terus dilanjutkan hingga kesembuhan tercapai.',
                'target_amount' => 15000000,
                'image' => 'campaign4.jpg',
            ],
            [
                'title' => 'Bantuan Korban Gempa',
                'description' => 'Gempa bumi yang terjadi baru-baru ini telah menyebabkan kerusakan pada rumah-rumah warga serta fasilitas umum. Banyak keluarga yang harus mengungsi dan membutuhkan bantuan segera. Donasi yang terkumpul akan digunakan untuk membantu kebutuhan dasar para korban seperti makanan, selimut, perlengkapan darurat, serta proses pemulihan pasca bencana.',
                'target_amount' => 8000000,
                'image' => 'campaign5.jpg',
            ],
            [
                'title' => 'Program Berbagi Sembako',
                'description' => 'Program berbagi sembako ini bertujuan untuk membantu masyarakat kurang mampu yang kesulitan memenuhi kebutuhan pokok sehari-hari. Bantuan berupa paket sembako akan disalurkan kepada keluarga yang membutuhkan agar mereka tetap dapat menjalani kehidupan dengan lebih layak. Dengan dukungan dari para donatur, program ini diharapkan dapat menjangkau lebih banyak penerima manfaat.',
                'target_amount' => 6000000,
                'image' => 'campaign6.jpg',
            ],
            [
                'title' => 'Renovasi Panti Asuhan',
                'description' => 'Panti asuhan ini telah menjadi tempat tinggal dan pembinaan bagi banyak anak yang membutuhkan perlindungan dan pendidikan. Namun kondisi bangunan saat ini sudah mulai rusak dan memerlukan perbaikan agar tetap aman dan nyaman untuk ditempati. Melalui campaign ini, kami mengajak Anda untuk bersama-sama membantu renovasi panti asuhan agar anak-anak dapat tinggal dan belajar dengan lebih baik.',
                'target_amount' => 12000000,
                'image' => 'campaign7.jpg',
            ],
        ];

        // simpan ke storage/app/public/campaigns/
        foreach ($campaigns as $file) {
            $fromPath = public_path('assets/img/campaigns/' . $file['image']);
            $toPath = 'campaigns/' . $file['image'];

            if (File::exists($fromPath)) {
                Storage::disk('public')->put($toPath, File::get($fromPath));
            }
        }

        foreach ($campaigns as $campaign) {
            DB::table('campaigns')->insert([
                'title' => $campaign['title'],
                'slug' => Str::slug($campaign['title']),
                'description' => $campaign['description'],
                'target_amount' => $campaign['target_amount'],
                'collected_amount' => 0,
                'image' => $campaign['image'],
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
