<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeedCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        \DB::table('category')->insert([
            'name'=>'Baju'
        ]);
        \DB::table('category')->insert([
            'name'=>'Celana'
        ]);
    }
}
