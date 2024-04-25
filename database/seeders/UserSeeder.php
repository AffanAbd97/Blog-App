<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        
        DB::table('account')->insert([
            [
                'name' => 'admin',
                'username' => 'admin',
                'password' => sha1('jksdhf832746aiH{}{()&(*&(*' . md5('12345678') . 'HdfevgyDDw{}{}{;;*766&*&*'),
                'role' => 'Admin',
            ],
            [
                'name' => 'User',
                'username' => 'user',
                'password' => sha1('jksdhf832746aiH{}{()&(*&(*' . md5('12345678') . 'HdfevgyDDw{}{}{;;*766&*&*'),
                'role' => 'Author',
            ]
        ]);
    }
}
