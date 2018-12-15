<?php

use Illuminate\Database\Seeder;
use App\Lomba;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\User::class, 50)->create();
        // lomba seeder
        // /1 imsso,2 imarc,3 inamsc,
        // 4 hfgm

        Lomba::create([
          'nama' => 'IMSSO', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 1, 'status_pengumpulan' => 1, 'kuota' => rand(50, 150)
        ]);

        Lomba::create([
          'nama' => 'IMARC', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 1, 'status_pengumpulan' => 1, 'kuota' => rand(50, 150)
        ]);

        Lomba::create([
          'nama' => 'INAMSC', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 1, 'status_pengumpulan' => 1, 'kuota' => rand(50, 150)
        ]);

        Lomba::create([
          'nama' => 'HFGM', 'jumlah_gelombang' => 2, 'gelombang_sekarang' => 1, 'biaya' => 150000,
          'status_pendaftaran' => 1, 'status_pengumpulan' => 1, 'kuota' => rand(50, 150)
        ]);

    }
}
