<?php

use AgenciaS3\Entities\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UserRole::class)->create([
            'name' => "Administrador"
        ]);

        factory(UserRole::class)->create([
            'name' => "Gerente"
        ]);

        factory(UserRole::class)->create([
            'name' => "Usuário"
        ]);
    }
}
