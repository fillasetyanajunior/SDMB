<?php

use Illuminate\Database\Seeder;

class SubuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subusers')->insert([
            'title' => 'Dashboard',
            'url' => '/home'
        ]);
        DB::table('subusers')->insert([
            'title' => 'Post Kultum',
            'url' => '/postkultum'
        ]);
        DB::table('subusers')->insert([
            'title' => 'Post Tokoh',
            'url' => '/posttokoh'
        ]);
        DB::table('subusers')->insert([
            'title' => 'Post Info Persyarikatan',
            'url' => '/postinfopersyarikatan'
        ]);
        DB::table('subusers')->insert([
            'title' => 'Post Milenial Muhammadiyah',
            'url' => '/postmilenial'
        ]);
        DB::table('subusers')->insert([
            'title' => 'Post Kiprah Umat',
            'url' => '/postkiprah'
        ]);
        DB::table('subusers')->insert([
            'title' => 'Post Seni Budaya',
            'url' => '/postseni'
        ]);
        DB::table('subusers')->insert([
            'title' => 'Post Saudagar Muhammadiyah',
            'url' => '/postsaudagar'
        ]);
        DB::table('subusers')->insert([
            'title' => 'Post Aisyiyah',
            'url' => '/postaisyiyah'
        ]);
        DB::table('subusers')->insert([
            'title' => 'Post Artikel',
            'url' => '/postartikel'
        ]);
        DB::table('subusers')->insert([
            'title' => 'Post Sejarah',
            'url' => '/postsejarah'
        ]);
        DB::table('subusers')->insert([
            'title' => 'Post Sponsor',
            'url' => '/sponsor'
        ]);
    }
}
