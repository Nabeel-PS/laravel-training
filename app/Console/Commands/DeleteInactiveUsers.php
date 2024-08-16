<?php

namespace App\Console\Commands;
use App\Models\User;
// use App\Console\Commands\DeleteInactiveUsershandle;
use Illuminate\Console\Command;

class DeleteInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:inactive_users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command Will Delete all inactive users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        User::where('status',0)->delete();         
        

    }
}
