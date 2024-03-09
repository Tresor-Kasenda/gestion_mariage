<?php

namespace App\Livewire\Pages\Candidats;

use App\Models\Candidat;
use App\Models\Mariage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]
class ListsCandidats extends Component
{
    public $candidats;

    public function mount(): void
    {
       $this->candidats = Mariage::query()
            ->with(['conjoint', 'candidat'])
            ->get()
            ->flatMap(fn ($mariage) => [$mariage->candidat, $mariage->conjoint]);
    }
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application
    {
        return view('livewire.pages.candidats.lists-candidats');
    }
}
