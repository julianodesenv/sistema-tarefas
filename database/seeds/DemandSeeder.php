<?php

use AgenciaS3\Entities\Demand;
use Illuminate\Database\Seeder;

class DemandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        static $password;

        factory(Demand::class)->create([
            'name' => 'Semanal',
            'active' => 'y',
            'unique' => 'n',
            'day' => 7
        ]);

        factory(Demand::class)->create([
            'name' => 'Quinzenal',
            'active' => 'y',
            'unique' => 'n',
            'day' => 15
        ]);

        factory(Demand::class)->create([
            'name' => 'Mensal',
            'active' => 'y',
            'unique' => 'n',
            'day' => 30
        ]);

        factory(Demand::class)->create([
            'name' => 'Trimestral',
            'active' => 'y',
            'unique' => 'n',
            'day' => 90
        ]);

        factory(Demand::class)->create([
            'name' => 'Semestral',
            'active' => 'y',
            'unique' => 'n',
            'day' => 130
        ]);

        factory(Demand::class)->create([
            'name' => 'Anual',
            'active' => 'y',
            'unique' => 'n',
            'day' => 365
        ]);
    }
}
