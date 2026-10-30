<?php

use Illuminate\Database\Seeder;

require_once __DIR__ . '/CmsSeeder.php';
require_once __DIR__ . '/BatikDataSeeder.php';

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PenggunaSeeder::class);
        $this->call(CmsSeeder::class);
        $this->call(BatikDataSeeder::class);
    }
}
