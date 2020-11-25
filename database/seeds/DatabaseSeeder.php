<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            AccessadminSeeder::class,
            AccessuserSeeder::class,
            MenuadminSeeder::class,
            MenuuserSeeder::class,
            SubadminSeeder::class,
            SubuserSeeder::class,
            ]);
    }
}
