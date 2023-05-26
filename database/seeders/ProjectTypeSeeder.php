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
            'title' => 'Coastal Erosion Trends and Management Strategies for Region 1',
            'about' => 'Coastal erosion is prevalent in the Philippines and will worsen with rising seas. Measures to address coastal erosion, in many cases, exacerbate rather than mitigate the problem. Due to lack of proper understanding of causes of erosion in particular and coastal dynamics in general and scarcity of personnel that can provide information and guidance for informed coastal erosion management strategies. ',
        ]);
        DB::table('project_types')->insert([
            'title' => 'Assesment Monitoring, and Prediction of Coastal Flooding of Selected Municipalities in Region 1',
            'about' => 'Coastal erosion is prevalent in the Philippines and will worsen with rising seas. Measures to address coastal erosion, in many cases, exacerbate rather than mitigate the problem. Due to lack of proper understanding of causes of erosion in particular and coastal dynamics in general and scarcity of personnel that can provide information and guidance for informed coastal erosion management strategies. ',
        ]);
        DB::table('project_types')->insert([
            'title' => 'Development of Science-based Engineering Approach to Coastal Prediction in Region 1',
            'about' => 'In this project, different concrete and coastal technologies that are proven effective will be combined to come up with innovations to improve coastal protection and management in the region and in the country. It is directed to look for materials that increases the durability of concrete and reduces the porosity without jeopardizing the strength such as fly-ash, rice husk ash and other pozzolanic materials.',
        ]);
        DB::table('project_types')->insert([
            'title' => 'Enhancing Coastal Design and Infrastructure Intervention through the Establishment of Wave Testing Facility',
            'about' => 'The project aims to establish a more rigorous and comprehensive evaluation and analysis to address the problem of coastal erosion and shoreline retreat and provide a baseline in the conduct of design and other pre-construction activities for coastal infrastructure projects. Current interventions do not holistically address the problems that arises within the coastal communities, probably because these interventions did not undergo rigorous scientific evaluation and analysis. Thus, science-based interventions should be formulated to provide an all-inclusive and long-term solution.',
        ]);
    }
}
