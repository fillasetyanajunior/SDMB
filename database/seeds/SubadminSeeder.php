<?php

use Illuminate\Database\Seeder;

class SubadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subadmins')->insert([
            'title' => 'Menuadmin',
            'url' => '/menuadmin'
        ]);
        DB::table('subadmins')->insert([
            'title' => 'Menuuser',
            'url' => '/menuuser'
        ]);
        DB::table('subadmins')->insert([
            'title' => 'Subadmin',
            'url' => '/subadmin'
        ]);
        DB::table('subadmins')->insert([
            'title' => 'Subuuser',
            'url' => '/subuser'
        ]);
        DB::table('subadmins')->insert([
            'title' => 'Accessadmin',
            'url' => '/accessadmin'
        ]);
        DB::table('subadmins')->insert([
            'title' => 'Accessuser',
            'url' => '/accessuser'
        ]);
        DB::table('subadmins')->insert([
            'title' => 'Manager User',
            'url' => '/users'
        ]);
        DB::table('subadmins')->insert([
            'title' => 'Role User',
            'url' => '/roleuser'
        ]);
        DB::table('subadmins')->insert([
            'title' => 'Daftar User',
            'url' => '/users/show'
        ]);
    }
}
