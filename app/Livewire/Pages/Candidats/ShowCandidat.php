<?php

namespace App\Livewire\Pages\Candidats;

use App\Models\Candidat;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowCandidat extends Component
{
    public string $candidat = '';

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.pages.candidats.show-candidat', [
            'result' => Candidat::find($this->candidat)->load(['user', 'commune'])
        ]);
    }
}
