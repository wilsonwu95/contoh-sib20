<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \DB::table('product')->insert([
            'product_code' => 'P-001',
            'product_name' => 'Laptop Legion',
            'price' => 33000000,
            'description' => "Laptop Gaming",
            'status' => 1
        ]);
        \DB::table('product')->insert([
            'product_code' => 'P-002',
            'product_name' => 'Mouse Alienware',
            'price' => 1500000,
            'description' => "Mouse Gaming",
            'status' => 1
        ]);
        \DB::table('product')->insert([
            'product_code' => 'P-003',
            'product_name' => 'Flashdisk 1TB',
            'price' => 300000,
            'description' => "USB Samsung",
            'status' => 1
        ]);
    }
}
