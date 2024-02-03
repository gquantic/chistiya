<?php

namespace App\Console\Commands\Admin;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = new User();
        $user->name = $this->ask('Имя пользователя');
        $user->email = strtolower($this->ask('Введите Email'));
        $user->password = \Hash::make($this->secret('Введите пароль'));
        $user->role = strtolower($this->ask('Введите тип пользователя на английском. admin/user'));
        $user->save();
    }
}
