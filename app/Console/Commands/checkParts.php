<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use App\Mail\partsRunOut;
use App\Models\Part;
use App\Models\User;
use Carbon\Carbon;

class checkParts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parts:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if any parts are running out of quantity.';

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
     * @return int
     */
    public function handle()
    {
        
        $parts = Part::all();
        $users = User::all();

        foreach($parts as $part) {

            if($part->qty <= 1) {

                $data = [
                    'title' => $part->description,
                    'quantity' => $part->qty,
                    'message' => 'Are running out, please check on the website and order new if you need any.',
                ];
    
                foreach($users as $user) {
                    if($user->notifications == 1 || $user->notifications == 4) {
                        Mail::to($user->email)->send(new partsRunOut($data));
                    }
                }

            }

        }

        $this->info('successfully sent mails.');

    }
}
