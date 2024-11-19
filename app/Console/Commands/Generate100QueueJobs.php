<?php

namespace App\Console\Commands;

use App\Jobs\CalculateMarksJobs;
use Illuminate\Support\Arr;
use App\Jobs\MoneyTransferJob;
use App\Jobs\SendMailJob;
use Illuminate\Console\Command;

class Generate100QueueJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate100-queue-jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       
        dispatch(new CalculateMarksJobs());
        
       
    }
}
