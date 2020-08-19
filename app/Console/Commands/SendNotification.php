<?php

namespace App\Console\Commands;

use App\Event;
use App\Mail\NotificationEvent;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifications:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to send notifications';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $events = Event::where('date', today())
            ->where('active', true)
            ->get();

        $user = User::first();

        if ($events->count() === 0) {
            return 0;
        }

        Mail::to($user->email)
            ->send(new NotificationEvent($events));

        foreach ($events as $event) {
            $event->date = $event->nextDate;
            $event->save();
        }

        return 0;
    }
}
