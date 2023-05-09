<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_types')->insert([
            'name' => 'Coastal Erosion Trends and Management Strategies for Region 1'
        ]);
        DB::table('project_types')->insert([
            'name' => 'Assesment Monitoring, and Prediction of Coastal Flooding of Selected Municipalities in Region 1'
        ]);
        DB::table('project_types')->insert([
            'name' => 'Development of Science-based Engineering Approach to Coastal Prediction in Region 1'
        ]);
        DB::table('project_types')->insert([
            'name' => 'Enhancing Coastal Design and Infrastructure Intervention through the Establishment of Wave Testing Facility'
        ]);
    }
}
