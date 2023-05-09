<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types')->insert([
            'name' => 'News'
        ]);
        DB::table('types')->insert([
            'name' => 'Announcement'
        ]);
        DB::table('types')->insert([
            'name' => 'Event'
        ]);
    }
}
