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

    public $userId;
    public function __construct($userId)
    {
        $this->userId = $userId;
        
    }
    /**
     * Create a new job instance.
     */
    public function retryUntil()
    {
        return now()->addSeconds(5);
    }
    
    /**
     * Execute the job.
     */
    public function handle()
    {
        // Retrieve the user using the ID
        $user = User::find($this->userId);
    
        if ($user) {
            Logger("SendMailJob mail:",[$user]);
    
            // Send email to admin
            Mail::to("solaiman.it3@gmail.com")->send(new RegisterEmailAdmin([
                'name' => 'Admin Demo',
            ]));

            Mail::to($user->email)->send(new RegisterEmailAdmin([
                'name' => 'User Demo',
            ]));


        } else {
            // Re-throw the exception if the user is not found after retries
            throw new \Exception("User not found with ID {$this->userId}");
        }
    }
}

