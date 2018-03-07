<?php

namespace Bantenprov\LajuInflasiKota\Models\Bantenprov\LajuInflasiKota;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LajuInflasiKota extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'laju_inflasi_kotas';
    protected $dates = [
        'deleted_at'
    ];
    protected $fillable = [
        'label',
        'description',
    ];
}
