<?php

namespace Bantenprov\LajuInflasiKota\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The LajuInflasiKota facade.
 *
 * @package Bantenprov\LajuInflasiKota
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class LajuInflasiKotaFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laju-inflasi-kota';
    }
}
