<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CalculateMarksJobs implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        echo "Generating Jobs \n";
        for ($i = 0; $i < 10; $i++) {
            dispatch(new CalculateMarksForAClassJobs($i));
        }
        echo "Complete \n";
    }
}
