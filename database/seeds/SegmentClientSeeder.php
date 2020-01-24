<?php

use AgenciaS3\Entities\SegmentClient;
use Illuminate\Database\Seeder;

class SegmentClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SegmentClient::class)->create([
            'name' => "Academia"
        ]);
        factory(SegmentClient::class)->create([
            'name' => "Construtora"
        ]);
        factory(SegmentClient::class)->create([
            'name' => "Cosméticos"
        ]);
        factory(SegmentClient::class)->create([
            'name' => "Dentista"
        ]);
    }
}
