<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("providers")->insert([
            "id" => 1,
            "name" => "github",
        ]);
        DB::table("providers")->insert([
            "id" => 2,
            "name" => "google",
        ]);
        DB::table("providers")->insert([
            "id" => 3,
            "name" => "twitter",
        ]);
    }
}
