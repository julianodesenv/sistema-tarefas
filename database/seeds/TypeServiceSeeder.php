<?php

use AgenciaS3\Entities\TypeService;
use Illuminate\Database\Seeder;

class TypeServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TypeService::class)->create([
            'name' => "Redes Sociais"
        ]);
        factory(TypeService::class)->create([
            'name' => "Site"
        ]);
        factory(TypeService::class)->create([
            'name' => "Criação"
        ]);
    }
}
