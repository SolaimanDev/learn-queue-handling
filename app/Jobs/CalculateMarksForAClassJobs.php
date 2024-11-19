<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CalculateMarksForAClassJobs implements ShouldQueue
{
    use Queueable;
public $className;
    /**
     * Create a new job instance.
     */
    public function __construct($className)
    {
       $this->className = $className;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        echo "Calculating marks for class: ". $this->className ."\n";
        sleep(2);
        echo "# Calculation completed for class: ". $this->className ."\n";
    }
}
