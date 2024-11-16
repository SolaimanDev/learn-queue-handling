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
        if($this->amount >100){
            throw new \Exception('Amount must be less than 1000');
        }
        echo " BDT ".$this->amount ." has been transfered your account";
    }
    public function failed($exception)
    {
        Mail::send([],[],function($message){
            $message->to('solaiman.it3@gmail.com')->subject('Money Transfer Failed')->html('Dear, Your Money Transfer has Failed');
        });
    }
}
