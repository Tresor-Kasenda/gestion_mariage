<?php

namespace App\Livewire;

use App\Models\Candidat;
use App\Models\Mariage;
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

    public string $start_date = '';

    public string $end_date = '';

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
{
    $searchTerm = $this->search;
    $startDate = $this->start_date;
    $endDate = $this->end_date;
    return view('livewire.dashboard', [
        'results' => Mariage::query()
            ->with(['candidat', 'femme'])
            ->when($startDate, fn ($query) => $query->where('date_mariage', '>=', $startDate))
            ->when($endDate, fn ($query) => $query->where('date_mariage', '<=', $endDate))
            ->whereHas('candidat', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('prenon', 'like', '%' . $searchTerm . '%')
                    ->orWhere('id_carte_electeur', 'like', '%' . $searchTerm . '%');
            })
            ->whereHas('femme', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('prenon', 'like', '%' . $searchTerm . '%')
                    ->orWhere('carte_electeur', 'like', '%' . $searchTerm . '%');
            })
            ->orderByDesc('created_at')
            ->get()
            ->flatMap(fn ($mariage) => [$mariage->candidat->load('user'), $mariage->femme->load('user')])
    ]);
}
}
