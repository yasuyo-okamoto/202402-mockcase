<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $registers = [
        'name' => '山田太郎',
        'email' => 'abcd@abcd.com',
        'password' => 'abcd1234'
    ];
    foreach ($registers as $register){
        DB::table('registerusers')->insert($register);
    }
    }
}
