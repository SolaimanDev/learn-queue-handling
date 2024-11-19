<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use App\Mail\RegisterEmailUser;
use App\Mail\RegisterEmailAdmin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailJob implements ShouldQueue
{
    use Queueable, InteractsWithQueue, SerializesModels;

    public $jobId;
    public function __construct($jobId)
    {
        $this->jobId = $jobId;
        
    }
    /**
     * Create a new job instance.
     */
   
    
    /**
     * Execute the job.
     */
    public function handle()
    {
       
        
            echo "#".$this->jobId ."Sending mail ...\n";
            sleep(4);
            echo "Mail sent\n";


    }
}

