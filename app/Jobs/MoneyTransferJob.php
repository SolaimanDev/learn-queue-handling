<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class MoneyTransferJob implements ShouldQueue
{
    use Queueable;
public $amount;
    /**
     * Create a new job instance.
     */
    public function __construct($amount)
    {
       $this->amount = $amount;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if($this->amount >100 && $this->attempts() < 3){
            throw new \Exception('Amount must be less than 1000');
        }
        echo " BDT ".$this->amount ." has been transfered your account. Attemps: ". $this->attempts();
    }
    public function failed($exception)
    {
        echo "BDT".$this->amount ." has been failed to transfer your account. Attemps: ". $this->attempts()." Exception: ". $exception->getMessage();
    }
}
