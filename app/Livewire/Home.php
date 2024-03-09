<?php

namespace App\Livewire;

use App\Models\Candidat;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class Home extends Component
{
    use WithPagination;

    #[Url(as: 'q')]
    public string $search = '';

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.dashboard', [
            'results' => Candidat::query()
                ->where('name', 'like', "%{$this->search}%")
                ->orWhere('prenom', 'like', "%{$this->search}%")
                ->orWhere('id_carte_electeur', 'like', "%{$this->search}%")
                ->orderBy('created_at', 'desc')
                ->paginate(9)
        ]);
    }
}
