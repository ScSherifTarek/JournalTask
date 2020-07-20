<?php

namespace App\Console\Commands;

use Hash;
use App\Author;
use Illuminate\Console\Command;

class MakeAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {--e|email : admin email} {--p|password : admin password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate an admin to manage the articles';

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
        $this->alert($this->description);

        $author = $this->createAuthor($this->option('email'), $password = $this->option('password') ?: '12345678');
        
        $author->makeAdmin();

        $this->table(['email', 'password'],[
            ['email' => $author->email, 'password' => $password]
        ]);

        $this->line('');
    }

    /**
     * Create admin model.
     *
     * @param string $email
     * @param string $password
     *
     * @return \App\Author
     */
    protected function createAuthor(?string $email, ?string $password): Author
    {
        $customization = [];

        if ($email) {
            $customization['email'] = $email;
        }

        if ($password) {
            $customization['password'] = Hash::make($password);
        }

        return factory(Author::class)->make($customization);
    }
}
