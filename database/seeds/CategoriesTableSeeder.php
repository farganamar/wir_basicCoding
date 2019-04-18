<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $array_name = array('Kosmetik' , 'Baju' , 'Buku' , 'Makanan', 'Perlengkapan Masak' , 'Alat Tulis');

        for ($i = 0; $i < sizeof($array_name); $i++) {
            DB::table('categories')->insert([
                'name' => $array_name[$i],
                'slug' => str_slug($array_name[$i], '-'),
            ]);
        }
    }
}
