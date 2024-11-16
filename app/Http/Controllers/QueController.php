<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Jobs\SendMailJob;
use Illuminate\Log\Logger;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use App\Jobs\MoneyTransferJob;
use App\Mail\RegisterEmailUser;
use App\Mail\RegisterEmailAdmin;
use Illuminate\Support\Facades\Mail;

class QueController extends Controller
{
    public function index()
    {
        $faker = Faker::create();
    
        // Generate and save a user
        $user = User::create([
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Default password for all users
        ]);

        // Dispatch the job with the user's ID
        dispatch(new SendMailJob($user->id));
    
        return response()->json(['message' => 'Random user generated and saved to the database']);
    }

    public function transfer()
    {
        dispatch(new MoneyTransferJob(rand(999, 10000)));
        return response()->json(['message' => 'Random amount has been transfered']);
    }
    



}
