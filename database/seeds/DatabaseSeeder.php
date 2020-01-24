<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(TypeClientSeeder::class);
        $this->call(SegmentClientSeeder::class);
        //$this->call(ClientSeeder::class);
        //$this->call(SectorSeeder::class);
        $this->call(TypeServiceSeeder::class);
        //$this->call(ServiceSeeder::class);
        $this->call(DemandSeeder::class);
        $this->call(SocialMediaStatusSeeder::class);
    }
}
