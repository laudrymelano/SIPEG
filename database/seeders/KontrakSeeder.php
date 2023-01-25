<?php

namespace Database\Seeders;

use App\Models\Kontrak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KontrakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kontrak::truncate(); //kosongkan table

        foreach ($this->getData() as $item) {
            $data[] = [
                'durasi' => $item['durasi'],
                'gaji' => $item['gaji'],
                'id_pegawai' => $item['id_pegawai']
            ];
        }

        Kontrak::insert($data);
    }

    private function getData()
    {
        return [
            ["durasi" => "3 Tahun", "gaji" => '5000000', "id_pegawai" => "1"],
        ];
    }
}
