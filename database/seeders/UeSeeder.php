<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('ues')->insert([[
            'nom' => "UE 1",
            'nombre_ecu' => 2,
            'masse_horaire_total' => 50,
            'masse_horaire_ecoule' => 0,
            'programme_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ], [
            'nom' => "UE 2",
            'nombre_ecu' => 3,
            'masse_horaire_total' => 100,
            'masse_horaire_ecoule' => 0,
            'programme_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]]);
    }
}
