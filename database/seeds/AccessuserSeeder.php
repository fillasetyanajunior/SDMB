<?php

use Illuminate\Database\Seeder;

class AccessuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accessusers')->insert([
            'menu_id' => '1',
            'sub_id' => '1',
        ]);
        DB::table('accessusers')->insert([
            'menu_id' => '2',
            'sub_id' => '2',
        ]);
        DB::table('accessusers')->insert([
            'menu_id' => '2',
            'sub_id' => '3',
        ]);
        DB::table('accessusers')->insert([
            'menu_id' => '2',
            'sub_id' => '4',
        ]);
        DB::table('accessusers')->insert([
            'menu_id' => '2',
            'sub_id' => '5',
        ]);
        DB::table('accessusers')->insert([
            'menu_id' => '2',
            'sub_id' => '6',
        ]);
        DB::table('accessusers')->insert([
            'menu_id' => '2',
            'sub_id' => '7',
        ]);
        DB::table('accessusers')->insert([
            'menu_id' => '2',
            'sub_id' => '8',
        ]);
        DB::table('accessusers')->insert([
            'menu_id' => '2',
            'sub_id' => '9',
        ]);
        DB::table('accessusers')->insert([
            'menu_id' => '2',
            'sub_id' => '10',
        ]);
        DB::table('accessusers')->insert([
            'menu_id' => '2',
            'sub_id' => '11',
        ]);
        DB::table('accessusers')->insert([
            'menu_id' => '2',
            'sub_id' => '12',
        ]);
    }
}
