<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectObjectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Project 1
        DB::table('project_objectives')->insert([
            'project_type_id' => '1',
            'objective' => 'Provide knowledge know-how to Region 1 HEI researchers on coastal erosion research.',
        ]);
        DB::table('project_objectives')->insert([
            'project_type_id' => '1',
            'objective' => 'Establish the trends and possible causes of erosion along the coasts of Region 1.',
        ]);
        DB::table('project_objectives')->insert([
            'project_type_id' => '1',
            'objective' => 'Identify hotspots of erosion and recommend management options that can be considered by the LGU.',
        ]);

        // Project 2
        DB::table('project_objectives')->insert([
            'project_type_id' => '2',
            'objective' => 'Provide knowledge know-how to Region 1 HEI researchers on coastal erosion research.',
        ]);
        DB::table('project_objectives')->insert([
            'project_type_id' => '2',
            'objective' => 'Establish the trends and possible causes of erosion along the coasts of Region 1.',
        ]);
        DB::table('project_objectives')->insert([
            'project_type_id' => '2',
            'objective' => 'Identify hotspots of erosion and recommend management options that can be considered by the LGU.',
        ]);

        // Project 3
        DB::table('project_objectives')->insert([
            'project_type_id' => '3',
            'objective' => 'Integrate appropriate bio-engineering and "sustainable" smart concrete technology for coastal protection structures considering the following criteria: (Strength, Durability, Permeability)',
        ]);
        DB::table('project_objectives')->insert([
            'project_type_id' => '3',
            'objective' => 'Develop bio-engineered artificial reef considering the following criteria: (Wave reduction, Structural strength, Biological and environmental function)',
        ]);

        // Project 4
        DB::table('project_objectives')->insert([
            'project_type_id' => '4',
            'objective' => 'Conduct inventory and assess existing flood control infrastructures in Region 1.',
        ]);
        DB::table('project_objectives')->insert([
            'project_type_id' => '4',
            'objective' => 'To establish a coastal engineering laboratory.',
        ]);
        DB::table('project_objectives')->insert([
            'project_type_id' => '4',
            'objective' => 'To develop, test and evaluate coastal flood infrastructure design that could be recommended to the LGUs.',
        ]);
    }
}
