<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EmpireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $json = File::get(database_path('seeders/data/empires.json'));
      $data = json_decode($json, true);
      DB::table('empires')->insert($data);
    }
}
