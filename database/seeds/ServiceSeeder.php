<?php

use AgenciaS3\Entities\Client;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\AgenciaS3\Entities\Service::class, 3)
            ->create();

    }
}
