<?php

namespace App\Livewire\Pages\Users;

use App\Models\Commune;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
#[Layout('layouts.app')]
class CreateUsers extends Component
{
    #[Validate('required|min:5')]
    public string $name = '';

    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required|exists:communes,id')]
    public string $commune = '';

    #[Validate('required|min:8')]
    public string $password = '';

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\View\View|Application
    {
        return view('livewire.pages.users.create-users',[
            'communes' => Commune::query()->get(['id', 'name'])
        ]);
    }

    public function store()
    {
        $this->validate();

        User::query()
            ->create([
                'name' => $this->name,
                'email' => $this->email,
                'commune_id' => $this->commune,
                'password' => Hash::make($this->password)
            ]);

        session()->flash('status', 'Gestionnaire cree avec succes!');

        return $this->redirect('/users', true);
    }
}
