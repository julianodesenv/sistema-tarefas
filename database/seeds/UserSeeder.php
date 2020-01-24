<?php

use AgenciaS3\Entities\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        static $password;

        factory(User::class)->create([
            'name' => "Juliano Monteiro",
            'email' => "juliano@agencias3.com.br",
            'password' => $password ?: $password = bcrypt('segredos3'),
            'remember_token' => \Illuminate\Support\Str::random(10),
            'role_id' => 1
        ]);

        factory(User::class)->create([
            'name' => "Gerente",
            'email' => "gerente@agencias3.com.br",
            'password' => $password ?: $password = bcrypt('segredos3'),
            'remember_token' => \Illuminate\Support\Str::random(10),
            'role_id' => 2
        ]);

        factory(User::class)->create([
            'name' => "Usuário",
            'email' => "usuario@agencias3.com.br",
            'password' => $password ?: $password = bcrypt('segredos3'),
            'remember_token' => \Illuminate\Support\Str::random(10),
            'role_id' => 3
        ]);

        /*
         *
        factory(\AgenciaS3\Entities\User::class, 1)
            ->create();
         */
    }
}
