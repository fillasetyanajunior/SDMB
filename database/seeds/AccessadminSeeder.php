<?php

use Illuminate\Database\Seeder;

class AccessadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accessadmins')->insert([
            'menu_id' => '1',
            'sub_id' => '1',
        ]);
        DB::table('accessadmins')->insert([
            'menu_id' => '1',
            'sub_id' => '2',
        ]);
        DB::table('accessadmins')->insert([
            'menu_id' => '1',
            'sub_id' => '3',
        ]);
        DB::table('accessadmins')->insert([
            'menu_id' => '1',
            'sub_id' => '4',
        ]);
        DB::table('accessadmins')->insert([
            'menu_id' => '1',
            'sub_id' => '5',
        ]);
        DB::table('accessadmins')->insert([
            'menu_id' => '1',
            'sub_id' => '6',
        ]);
        DB::table('accessadmins')->insert([
            'menu_id' => '2',
            'sub_id' => '7',
        ]);
        DB::table('accessadmins')->insert([
            'menu_id' => '2',
            'sub_id' => '8',
        ]);
        DB::table('accessadmins')->insert([
            'menu_id' => '2',
            'sub_id' => '9',
        ]);
    }
}
