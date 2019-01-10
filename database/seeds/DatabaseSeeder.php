<?php

use Illuminate\Database\Seeder;
use App\Lomba;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      // participant seeder
        $user = factory(App\User::class, 10)->create();

        // admin seeder
        for ($i=0; $i < 3; $i++) {
          User::create([
            'name' => 'Admin'.($i+1),
            'email' => 'admin'.($i+1).'@gmail.com',
            'email_token' => base64_encode('admin'.($i+1).'@gmail.com'),
            'password' => bcrypt('ligmedku2019'),
            'remember_token' => str_random(10),
            'verified' => 1,
            'role' => 2
          ]);
        }


        // lomba seeder
        // /1 imsso,2 imarc,3 inamsc,
        // 4 hfgm

        // Lomba::create([
        //   'nama' => 'IMSSO', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
        //   'status_pendaftaran' => 1, 'status_pengumpulan' => 1, 'kuota' => rand(50, 150), 'dp' => 150000
        // ]);
        //
        // Lomba::create([
        //   'nama' => 'IMARC', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
        //   'status_pendaftaran' => 1, 'status_pengumpulan' => 1, 'kuota' => rand(50, 150), 'dp' => 150000
        // ]);
        //
        // Lomba::create([
        //   'nama' => 'INAMSC', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
        //   'status_pendaftaran' => 1, 'status_pengumpulan' => 1, 'kuota' => rand(50, 150), 'dp' =>150000
        // ]);
        //
        // Lomba::create([
        //   'nama' => 'HFGM', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
        //   'status_pendaftaran' => 1, 'status_pengumpulan' => 1, 'kuota' => rand(50, 150), 'dp' => 150000
        // ]);

        Lomba::create([
          'id' => 1, 'nama' => 'Symposium & Workshop', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 1, 'status_pengumpulan' => 1, 'kuota' => rand(50, 150), 'dp' => 150000
        ]);

        Lomba::create([
          'id' => 2, 'nama' => 'Educational Video', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 1, 'status_pengumpulan' => 1, 'kuota' => rand(50, 150), 'dp' => 150000
        ]);

        Lomba::create([
          'id' => 3, 'nama' => 'Public Poster', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 1, 'status_pengumpulan' => 1, 'kuota' => rand(50, 150), 'dp' => 150000
        ]);

        Lomba::create([
          'id' => 4, 'nama' => 'Literature Review', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 1, 'status_pengumpulan' => 1, 'kuota' => rand(50, 150), 'dp' => 150000
        ]);

        Lomba::create([
          'id' => 5, 'nama' => 'Research Paper', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 1, 'status_pengumpulan' => 1, 'kuota' => rand(50, 150), 'dp' => 150000
        ]);

        Lomba::create([
          'id' => 6, 'nama' => 'Men Basketball', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 0, 'status_pengumpulan' => 0, 'kuota' => rand(50, 150), 'dp' => 150000
        ]);

        Lomba::create([
          'id' => 7, 'nama' => 'Women Basketball', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 0, 'status_pengumpulan' => 0, 'kuota' => rand(50, 150), 'dp' => 150000
        ]);

        Lomba::create([
          'id' => 8, 'nama' => 'Men Futsal', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 0, 'status_pengumpulan' => 0, 'kuota' => rand(50, 150), 'dp' => 150000
        ]);

        Lomba::create([
          'id' => 9, 'nama' => 'Photography', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 0, 'status_pengumpulan' => 0, 'kuota' => rand(50, 150), 'dp' => 150000
        ]);

        Lomba::create([
          'id' => 10, 'nama' => 'Traditional Dance', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 0, 'status_pengumpulan' => 0, 'kuota' => rand(50, 150), 'dp' => 150000
        ]);

        Lomba::create([
          'id' => 11, 'nama' => 'Vocal Group', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 0, 'status_pengumpulan' => 0, 'kuota' => rand(50, 150), 'dp' => 150000
        ]);

        Lomba::create([
          'id' => 12, 'nama' => 'Band', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 0, 'status_pengumpulan' => 0, 'kuota' => rand(50, 150), 'dp' => 150000
        ]);

        Lomba::create([
          'id' => 13, 'nama' => 'Campaign', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 0, 'status_pengumpulan' => 0, 'kuota' => rand(50, 150), 'dp' => 150000
        ]);

        Lomba::create([
          'id' => 14, 'nama' => 'Concert', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 0, 'status_pengumpulan' => 0, 'kuota' => rand(50, 150), 'dp' => 150000
        ]);
    }
}
