<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::truncate(); //kosongkan table

        foreach ($this->getData() as $item) {
            $data[] = [
                'nama' => $item['nama'],
                'password' => $item['password'],
                'alamat' => $item['alamat'],
                'no_telp' => $item['no_telp'],
                'id_jabatan' => $item['id_jabatan'],
                'id_kontrak' => $item['id_kontrak']
            ];
        }

        Pegawai::insert($data);
    }

    private function getData()
    {
        return [
            ["nama" => "laudry", "password" => bcrypt('123456'), "alamat" => "jl.flamboyan", "no_telp" => "0123456", "id_jabatan" => "1", "id_kontrak" => "1"],

        ];
    }
}
