<?php

use AgenciaS3\Entities\Client;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\AgenciaS3\Entities\Sector::class, 5)
            ->create();

    }
}
