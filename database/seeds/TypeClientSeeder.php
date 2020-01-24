<?php

use AgenciaS3\Entities\TypeClient;
use Illuminate\Database\Seeder;

class TypeClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TypeClient::class)->create([
            'name' => "Cliente"
        ]);
        factory(TypeClient::class)->create([
            'name' => "Prospect"
        ]);
        factory(TypeClient::class)->create([
            'name' => "Fornecedor"
        ]);
        factory(TypeClient::class)->create([
            'name' => "Parceiro"
        ]);
    }
}
