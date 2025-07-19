<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PendaftaranSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 10) as $i) {
            Pendaftaran::create([
                'tanggal_daftar' => now(),
                'nama_lengkap' => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'nisn' => $faker->numerify('##########'),
                'nik' => $faker->nik(),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date('Y-m-d', '2015-01-01'),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                'berkebutuhan_khusus' => $faker->optional()->word,

                'dusun' => $faker->streetName,
                'desa' => $faker->citySuffix,
                'kode_pos' => $faker->postcode,
                'kecamatan' => $faker->city,
                'kab_kota' => $faker->city,
                'provinsi' => $faker->state,

                'alat_transportasi' => $faker->randomElement(['Jalan kaki', 'Sepeda', 'Motor', 'Mobil']),
                'jenis_tinggal' => $faker->randomElement(['Bersama orang tua', 'Kos', 'Asrama']),
                'no_telp_rumah' => $faker->optional()->phoneNumber,
                'no_hp' => $faker->phoneNumber,
                'email' => $faker->safeEmail,

                'tinggi_badan' => $faker->numberBetween(100, 150),
                'berat_badan' => $faker->numberBetween(20, 50),
                'jarak_ke_sekolah' => $faker->randomFloat(1, 0.1, 10),
                'waktu_tempuh_ke_sekolah' => $faker->numberBetween(5, 60),
                'jumlah_saudara' => $faker->numberBetween(0, 5),

                'nik_ayah' => $faker->nik(),
                'nama_ayah' => $faker->name('male'),
                'tahun_lahir_ayah' => $faker->year('1980'),
                'berkebutuhan_khusus_ayah' => $faker->optional()->word,
                'pekerjaan_ayah' => $faker->jobTitle,
                'pendidikan_ayah' => $faker->randomElement(['SMA', 'S1', 'S2']),
                'penghasilan_ayah' => $faker->randomElement(['<1jt', '1-3jt', '>3jt']),

                'nik_ibu' => $faker->nik(),
                'nama_ibu' => $faker->name('female'),
                'tahun_lahir_ibu' => $faker->year('1982'),
                'berkebutuhan_khusus_ibu' => $faker->optional()->word,
                'pekerjaan_ibu' => $faker->jobTitle,
                'pendidikan_ibu' => $faker->randomElement(['SMA', 'S1', 'S2']),
                'penghasilan_ibu' => $faker->randomElement(['<1jt', '1-3jt', '>3jt']),

                'foto_ktp' => 'ktp_dummy.jpg',
                'foto_kk' => 'kk_dummy.jpg',
                'foto_akte' => 'akte_dummy.jpg',
            ]);
        }
    }
}
