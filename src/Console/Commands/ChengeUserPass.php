<?php

namespace Asmi046\SiteSkelet\Console\Commands;

use App\Models\User;
use App\Models\CarNumber;
use App\Mail\CronTestMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Console\PromptsForMissingInput;

class ChengeUserPass extends Command  implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:new-pass {email : Электронная почта} {pass : Новый Пароль}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Новый пароль для пользователя';


    /**
     * Prompt for missing input arguments using the returned questions.
     *
     * @return array<string, string>
     */
    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'email' => 'Введите e-mail:',
            'pass' => 'Введите пароль:',
        ];
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $email = $this->argument('email');
        $pass = Hash::make($this->argument('pass'));


        User::where('email', $email)->update([
            'password' => $pass
        ]);

        $this->info("Пароль изменен!");

    }
}
