<?php

use AgenciaS3\Entities\SocialMediaStatus;
use Illuminate\Database\Seeder;

class SocialMediaStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        static $password;

        factory(SocialMediaStatus::class)->create([
            'name' => 'Pautar',
            'active' => 'y',
            'color' => '#f4cccc',
            'order' => 1
        ]);

        factory(SocialMediaStatus::class)->create([
            'name' => 'Aguardando Arte',
            'active' => 'y',
            'color' => '#fff2cc',
            'order' => 2
        ]);

        factory(SocialMediaStatus::class)->create([
            'name' => 'Fazer Texto',
            'active' => 'y',
            'color' => '#cdddf9',
            'order' => 3
        ]);

        factory(SocialMediaStatus::class)->create([
            'name' => 'Aguardando Aprovação',
            'active' => 'y',
            'color' => '#e69138',
            'order' => 4
        ]);

        factory(SocialMediaStatus::class)->create([
            'name' => 'Aguardando Cliente',
            'active' => 'y',
            'color' => '#b8b8b8',
            'order' => 5
        ]);

        factory(SocialMediaStatus::class)->create([
            'name' => 'Programado',
            'active' => 'y',
            'color' => '#d9ead3',
            'order' => 6
        ]);

        factory(SocialMediaStatus::class)->create([
            'name' => 'Postado',
            'active' => 'y',
            'color' => '#b6d7a8',
            'order' => 7
        ]);
    }
}
