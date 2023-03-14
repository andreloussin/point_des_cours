<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EcuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ecus')->insert([[
            'nom' => "ECU 1.1",
            'nom_enseignant' => "jim",
            'masse_horaire_total' => 25,
            'masse_horaire_ecoule' => 0,
            'ue_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],[
            'nom' => "ECU 1.2",
            'nom_enseignant' => "joe",
            'masse_horaire_total' => 25,
            'masse_horaire_ecoule' => 0,
            'ue_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],[
            'nom' => "ECU 2.1",
            'nom_enseignant' => "bil",
            'masse_horaire_total' => 25,
            'masse_horaire_ecoule' => 0,
            'ue_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],[
            'nom' => "ECU 2.2",
            'nom_enseignant' => "bob",
            'masse_horaire_total' => 25,
            'masse_horaire_ecoule' => 0,
            'ue_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],[
            'nom' => "ECU 2.3",
            'nom_enseignant' => "ben",
            'masse_horaire_total' => 50,
            'masse_horaire_ecoule' => 0,
            'ue_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],]);
    }
}
