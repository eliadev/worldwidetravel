<?php

namespace App\Console\Commands;

use App\User;
use App\Client;
use Notification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Notifications\ClientBirth;

class SendBirthdayNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'worldtravel:send-birthday-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will send birthday notification for clients.';

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
        $dateFormat = Carbon::now()->format('Y-m-d');
        $user = User::where('is_superadmin', '=', 1)->first();

        $clients = Client::all();
        foreach($clients as $client) 
        {
            if($client->date_of_birth === $dateFormat){
                Notification::send($client, new ClientBirth);
                Notification::send($user, new ClientBirth($client->full_name));
                $this->line('email sent to '.$client->email);
                
                // this is only for mailtrap dev account. it does not allow multiple emails per second.
                if(env('MAIL_HOST', false) == 'smtp.mailtrap.io'){
                    sleep(1);
                }
            }
        }
    }
}
