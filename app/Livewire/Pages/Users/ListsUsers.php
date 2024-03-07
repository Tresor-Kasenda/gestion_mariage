<?php

namespace App\Livewire\Pages\Users;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class ListsUsers extends Component
{
    use WithPagination;

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.pages.users.lists-users', [
            'users' => User::query()->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
