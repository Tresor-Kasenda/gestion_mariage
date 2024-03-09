<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agent <span class="bg-indigo-100 px-4 py-1 rounded">{{ auth()->user()->name }}</span> | <span class="bg-indigo-500 rounded-full px-3 py-1 text-white">Commune de {{ auth()->user()->commune->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 grid grid-cols-4 items-center gap-4">
                    <x-text-input
                        label="Name"
                        name="name"
                        wire:model.live="search"
                        class="w-full px-3 py-2 col-span-2"
                        placeholder="Rechercher le nom d'un client"
                    />
                    <input
                        type="date"
                        label="start_date"
                        name="start_date"
                        wire:model.live="start_date"
                        class="w-full px-3 py-2 col-span-1"
                        placeholder="Date de debut"
                    />
                    <input
                        type="date"
                        label="end_date"
                        name="end_date"
                        wire:model.live="end_date"
                        class="w-full px-3 py-2 col-span-1"
                        placeholder="Date de fin"
                    />
                </div>
            </div>

            @if($search !==null)
                <div class="bg-slate-50 p-6 shadow rounded">
                    <section class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">
                        @foreach($results as $key => $result)
                            <div wire:key="{{ $key }}" class="w-80 bg-white shadow-md rounded-xl duration-500">
                                <a href="{{ route('candidat-show', $result->id) }}" wire:navigate>
                                    <img
                                        src="{{ asset('storage/'.$result->photos) }}"
                                        alt="{{ $result->name }}"
                                        class="size-60 object-cover rounded-t-xl aspect-auto"
                                    />
                                    <div class="px-4 py-3 w-80 space-y-2">
                                        <p class="text-lg font-bold text-black truncate capitalize flex items-center space-x-4">
                                            <span>Nom et Prenom: </span>
                                            <span>{{ $result->name . " " . $result->prenon }}</span>
                                        </p>
                                        <p class="text-lg font-bold text-black truncate capitalize flex items-center space-x-4">
                                            <span>Date Naissance: </span>
                                            <span>{{ $result->date_naissance->format('Y-m-d') }}</span>
                                        </p>
                                        <p class="text-lg font-bold text-black truncate bg-blue-300 capitalize flex items-center space-x-4">
                                            <span>Date de Mariage: </span>
                                            <span>{{ $result->mariage->date_mariage->format('Y-m-d') }}</span>
                                        </p>
                                        <p class="flex items-center space-x-4">
                                            <span>Numero Piece: </span>
                                            <span class="text-lg font-semibold text-black cursor-auto">
                                                {{ $result->id_carte_electeur ?? $result->mariage->femme->carte_electeur }}
                                            </span>
                                        <p class="space-x-2 bg-red-400 py-1 px-2 rounded-full">
                                            <span class="text-xs text-center justify-items-center text-white cursor-auto">
                                                Marié a la commune : {{ $result->commune->name }}
                                            </span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </section>
                </div>
            @endif
        </div>
    </div>
</div>
