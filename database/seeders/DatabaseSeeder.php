<?php

namespace Database\Seeders;

use App\Models\Desa;
use App\Models\Category;
use App\Models\Kecamatan;
use App\Models\JenisUsaha;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // tambahkan import untuk kelas User
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin123123'), // disarankan menggunakan Hash untuk mengenkripsi password
            'level' => 'admin',
            'images' => '',
        ]);

        User::create([
            'name' => 'Rahul Rahmatullah',
            'email' => 'rahul@email.com',
            'password' => Hash::make('rahul123123'), // disarankan menggunakan Hash untuk mengenkripsi password
            'level' => 'mitra',
            'images' => '',
        ]);

        Desa::create([
            'desa' => 'Desa Ngargoyoso',
            'kecamatan' => 'Ngargoyoso',
            'kabupaten' => 'Karanganyar', // Sesuaikan dengan nama kabupaten yang sesuai
            'provinsi' => 'Jawa Tengah', // Sesuaikan dengan nama provinsi yang sesuai
            'description' => 'Desa Ngargoyoso', // Deskripsi desa
            'images' => '', // Nama gambar desa
        ]);

        Kecamatan::create([
            'kecamatan' => 'Ngargoyoso'
        ]);

        Category::create([
            'category' => 'Buah & Sayuran',
            'images' => '', // Nama file gambar yang sudah ada di direktori proyek
        ]);

        JenisUsaha::create([
            'jenisUsaha' => 'Pertanian',
        ]);

        JenisUsaha::create([
            'jenisUsaha' => 'Perdagangan',
        ]);

        JenisUsaha::create([
            'jenisUsaha' => 'Peternakan',
        ]);

        JenisUsaha::create([
            'jenisUsaha' => 'Perikanan',
        ]);

        JenisUsaha::create([
            'jenisUsaha' => 'Jasa',
        ]);

        // DB::table('about_us')->insert([
        //     'history' => 'Sejarah Desa Ngargoyoso',
        //     'logo_meaning' => 'Logo ini berarti',
        //     'visi' => 'Tulis visi disini',
        //     'misi' => 'Tulis misi disini',
        //     'images' => 'public/img/Logo.png', // Ganti dengan nama file gambar yang ingin Anda gunakan
        // ]);

    }
}
