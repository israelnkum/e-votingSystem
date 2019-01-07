<?php

use Illuminate\Database\Seeder;

class NomineesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Nominee::class, 20)->create();
    }
}
