<?php

/* Require */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/* Models */
use Bantenprov\LajuInflasiKota\Models\Bantenprov\LajuInflasiKota\LajuInflasiKota;

class BantenprovLajuInflasiKotaSeederLajuInflasiKota extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
        Model::unguard();

        $laju_inflasi_kotas = (object) [
            (object) [
                'label' => 'G2G',
                'description' => 'Goverment to Goverment',
            ],
            (object) [
                'label' => 'G2E',
                'description' => 'Goverment to Employee',
            ],
            (object) [
                'label' => 'G2C',
                'description' => 'Goverment to Citizen',
            ],
            (object) [
                'label' => 'G2B',
                'description' => 'Goverment to Business',
            ],
        ];

        foreach ($laju_inflasi_kotas as $laju_inflasi_kota) {
            $model = LajuInflasiKota::updateOrCreate(
                [
                    'label' => $laju_inflasi_kota->label,
                ],
                [
                    'description' => $laju_inflasi_kota->description,
                ]
            );
            $model->save();
        }
	}
}
