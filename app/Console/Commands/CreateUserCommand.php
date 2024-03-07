<?php

namespace App\Console\Commands;

use App\Models\Commune;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;
use function Laravel\Prompts\search;
use function Laravel\Prompts\select;
use function Laravel\Prompts\text;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ajouter:administrateur';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ajouter un administrateur à l\'application.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('💥🍀Create user command executed!💥🍀');
        $name = text(
            label: 'Quel est votre nom?',
            validate: fn (string $value) => match (true) {
                strlen($value) < 3 => 'The name must be at least 3 characters.',
                strlen($value) > 255 => 'The name must not exceed 255 characters.',
                default => null
            }
        );

        $email = text(
            label: 'Quel est votre email?',
            validate: fn (string $value) => filter_var($value, FILTER_VALIDATE_EMAIL) ? null : 'The email is not valid.'
        );

        $data = search(
            'Quelle est votre commune?',
            fn (string $value) => strlen($value) > 0
                ? Commune::where('name', 'like', "%{$value}%")->pluck('name', 'id')->toArray()
                : []
        );

        $commune = Commune::query()
            ->where('name', '=', $data)
            ->first();

        $password = password(
            label: 'What is your password?',
            validate: fn (string $value) => match (true) {
                strlen($value) < 8 => 'The password must be at least 8 characters.',
                default => null
            }
        );


        User::query()
            ->create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'is_admin' => true,
                'commune_id' => $commune->id
            ]);

        $this->info('💥🍀 Uitilisateur cree avec success!..❤💚💝💥🍀');
    }
}
