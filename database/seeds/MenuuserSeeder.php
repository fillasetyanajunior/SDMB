<?php

use Illuminate\Database\Seeder;

class MenuuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menuusers')->insert([
            'title' => 'Home',
            'icon' => 'fa fa-fw fa-home'
        ]);
        DB::table('menuusers')->insert([
            'title' => 'Postingan',
            'icon' => 'fa fa-fw fa-upload'
        ]);
    }
}
