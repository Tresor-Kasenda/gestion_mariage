<?php

namespace App\Livewire\Pages\Candidats;

use App\Models\Candidat;
use App\Models\Femme;
use App\Models\Mariage;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class AddCandidat extends Component
{
    use WithFileUploads;

    #[Validate('required|string|max:255|min:3')]
    public $nom_marier = '';

    #[Validate('required|string|max:255|min:3')]
    public $prenom_marier = '';

    #[Validate('required|date:Y-m-d|before:today')]
    public $date_naissance_marier = '';

    #[Validate('required|string|max:255|min:3')]
    public $carte_electeur = '';

    #[Validate('required|image|mimes:jpeg,png,jpg,gif,svg')]
    public $photo_marier = '';

    #[Validate('required|string|max:255|min:3')]
    public $nom_marieer = '';

    #[Validate('required|string|max:255|min:3')]
    public $prenom_marieer = '';

    #[Validate('required|date:Y-m-d|before:today')]
    public $date_naissance_marieer = '';

    #[Validate('required|string|max:255|min:3')]
    public $carte_identite_marieer = '';

    #[Validate('required|image|mimes:jpeg,png,jpg,gif,svg')]
    public $photos_marieer = '';

    #[Validate('required|date:Y-m-d|after:today')]
    public $date_mariage = '';
    #[Validate('required')]
    public $marier_gender = '';

    #[Validate('required')]
    public $marieer_gender = '';


    public function render(): View|Application|Factory|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.pages.candidats.add-candidat');
    }

    public function storeCandidat()
    {
        $this->validate();

        $marier = Candidat::query()
            ->create([
                'name' => $this->nom_marier,
                'prenon' => $this->prenom_marier,
                'date_naissance' => $this->date_naissance_marier,
                'id_carte_electeur' => $this->carte_electeur,
                'photos' => $this->photo_marier->storePublicly('/', ['disk' => 'public']),
                'user_id' => auth()->id(),
                'commune_id' => auth()->user()->commune_id,
                'gender' => $this->marier_gender
            ]);

        Log::info('User created a new candidat', ['user' => auth()->user()->name, 'candidat' => $marier->name]);

        $marieer = Femme::query()
            ->create([
                'name' => $this->nom_marieer,
                'prenon' => $this->prenom_marieer,
                'date_naissance' => $this->date_naissance_marieer,
                'carte_electeur' => $this->carte_identite_marieer,
                'photos' => $this->photos_marieer->storePublicly('/', ['disk' => 'public']),
                'user_id' => auth()->id(),
                'commune_id' => auth()->user()->commune_id,
                'gender' => $this->marieer_gender
            ]);

        Log::info('User created a new candidat', ['user' => auth()->user()->name, 'candidat' => $marieer->name]);

        Mariage::query()
            ->create([
                'candidat_id' => $marier->id,
                'conjoint_id' => $marieer->id,
                'date_mariage' => $this->date_mariage,
            ]);

       session()->flash('status', 'Candidat ajouté avec succès');

       return $this->redirect('/candidats', true);
    }
}
