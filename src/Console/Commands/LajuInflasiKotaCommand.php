<?php

namespace Bantenprov\LajuInflasiKota\Console\Commands;

use Illuminate\Console\Command;

/**
 * The LajuInflasiKotaCommand class.
 *
 * @package Bantenprov\LajuInflasiKota
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class LajuInflasiKotaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:laju-inflasi-kota';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\LajuInflasiKota package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Welcome to command for Bantenprov\LajuInflasiKota package');
    }
}
