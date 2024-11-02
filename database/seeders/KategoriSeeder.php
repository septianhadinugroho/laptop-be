<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        kategori::truncate();
        Schema::enableForeignKeyConstraints();
        $data = [
            'ringan', 'berat'
        ];
        foreach ($data as $value) {
            kategori::create([
                'name' => $value
            ]);
        }
    }
}
