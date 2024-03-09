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
        $candidat = Candidat::find($this->candidat);
        $conjoint = [];
        $conjointe = [];

        if ($candidat->gender === 'Homme') {
            $conjoint[] = Mariage::where('candidat_id', $candidat->id)->first()->conjoint;
        }

        if ($candidat->gender === 'Femme') {
            $conjointe[] = Mariage::where('conjoint_id', $candidat->id)->first()->candidat;
        }

        dd(
            $candidat,
            $conjoint,
            $conjointe
        );

        return [
            'candidat' => $candidat,
            'mariage' => $mariage
        ];
    }
}
