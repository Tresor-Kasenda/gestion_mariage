<?php

namespace App\Livewire\Pages\Candidats;

use App\Models\Candidat;
use App\Models\Mariage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class ListsCandidats extends Component
{
    use WithPagination;

    public $candidats;
    public string $sortBy = 'created_at';
    public string $sortDirection = 'desc';

    public function mount(): void
    {
        $sortColumn = $this->sortBy;
        $sortDirection = $this->sortDirection;

        $query = Mariage::query()
            ->with(['candidat', 'femme'])
            ->orderBy($sortColumn, $sortDirection);

        if (!auth()->user()->is_admin) {
            $query->whereHas('candidat', function ($query) {
                $query->where('user_id', auth()->id());
            });
        }

        $this->candidats = $query->get()
            ->flatMap(fn ($mariage) => [$mariage->candidat->load('user'), $mariage->femme->load('user')]);
    }


    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application
    {
        return view('livewire.pages.candidats.lists-candidats');
    }




    public function sortBy(string $column): void
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumn = $column;
    }
}
