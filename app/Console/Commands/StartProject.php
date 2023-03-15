<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class StartProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start Project Config';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        Artisan::call('migrate:fresh');
        $this->info('Database migrated');

        Artisan::call('db:seed');
        $this->info('Database Seeded');

        $this->info('Create your own admin account, follow steps: ');
        $name = $this->ask('enter your name');
        $email = $this->ask('enter your email');
        $phone = $this->ask('enter your phone');
        $password = $this->ask('enter your password');

        Admin::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => Hash::make($password)
        ]);

        $this->info('Hello ' . $name . ' your account was created!');

        return Command::SUCCESS;
    }
}
