<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::truncate(); //kosongkan table

        foreach ($this->getData() as $item) {
            $data[] = [
                'posisi' => $item['posisi'],
            ];
        }

        Jabatan::insert($data);
    }

    private function getData()
    {
        return [
            ['posisi' => 'Karyawan'],
            ['posisi' => 'Manager'],
            ['posisi' => 'Direktur'],
        ];
    }
}
