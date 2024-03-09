<?php

namespace App\Livewire\Pages\Candidats;

use App\Concers\GenderEnum;
use App\Models\Candidat;
use App\Models\Mariage;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowCandidat extends Component
{
    public string $candidat = '';

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.pages.candidats.show-candidat', [
            'result' => $this->results()
        ]);
    }

    public function results()
    {
        // get the candidat by id and relationship with mariage and femme
        return Candidat::query()
            ->with(['mariage', 'mariage.femme'])
            ->where('id', $this->candidat)
            ->first();
    }
}
