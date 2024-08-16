<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

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
     
     public function handle():
     {
       User::where('status', 0)->delete();
 
    
     }
          
    
}
