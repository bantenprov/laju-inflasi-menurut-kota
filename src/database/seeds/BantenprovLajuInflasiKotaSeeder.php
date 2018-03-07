<?php

use Illuminate\Database\Seeder;

class BantenprovLajuInflasiKotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(BantenprovLajuInflasiKotaSeederLajuInflasiKota::class);
    }
}
