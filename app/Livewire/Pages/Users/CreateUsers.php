<?php

namespace App\Livewire\Pages\Users;

use App\Models\Commune;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]
class CreateUsers extends Component
{
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.pages.users.create-users',[
            'communes' => Commune::all()
        ]);
    }
}
