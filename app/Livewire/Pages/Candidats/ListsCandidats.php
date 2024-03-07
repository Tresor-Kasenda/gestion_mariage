<?php

namespace App\Livewire\Pages\Candidats;

use App\Models\Candidat;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]
class ListsCandidats extends Component
{
    public $candidats;

    public function mount(): void
    {
        $this->candidats = Candidat::query()
            ->with(['commune', 'marierAvec'])
            ->orderBy('created_at', 'desc')
            ->whereHas('commune', function ($query) {
                $query->where('id', auth()->user()->commune_id);
            })
            ->get();
    }
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.pages.candidats.lists-candidats');
    }
}
