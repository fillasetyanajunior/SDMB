<?php

use Illuminate\Database\Seeder;

class MenuadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menuadmins')->insert([
            'title' => 'Layout',
            'icon' => 'fa fa-fw fa-clone'
        ]);
        DB::table('menuadmins')->insert([
            'title' => 'Management',
            'icon' => 'fa fa-fw fa-folder'
        ]);
    }
}
